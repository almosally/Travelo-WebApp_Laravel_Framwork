<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;
use Image;
use App\Country;

class PostsController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //Authorization we right exception in order to access the index and view but not creat a post
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }

    /**control posts function crud
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$posts= Post::all();
        //$posts= post::orderBy('title','asc')->take(1)->get(); 1 refer to the first post
        // $posts= post::orderBy('title','asc')->get();
        $posts= post::all()->paginate(10); //make pages number to scrol
        return view('posts.index')->with ('posts',$posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'country'=>'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        //handle file
        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');

            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            Image::make($file)->insert(storage_path("app/public/cover_images/watermark.png"))->save(storage_path("app/public/cover_images/" . $fileNameToStore));
        } else {
            $fileNameToStore = 'noImage.jpg';
        }

        //create post
        $post=new Post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id =auth()->user()->id;//look to current user
        $post->cover_image = $fileNameToStore;
        $post->country_id = $request->input('country') + 1;
        $post->save();

        return redirect('/')->with ('success','post created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //
    public function show($id)
    {
        //$posts=Post::all();


        //return=Post::where('title','Post Two')->get();
        // $posts=DB::select('select * from posts');
        //$posts= Post::orderBy('title','desc')->get();
        // $posts= post::orderBy('title','desc')->get();
        $post= Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post= Post::find($id);
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'country'=>'required',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        $post=Post::find($id);
        //handle file
        if($request->hasFile('cover_image')){
            $file = $request->file('cover_image');

            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            Image::make($file)->insert(storage_path("app/public/cover_images/watermark.png"))->save(storage_path("app/public/cover_images/" . $fileNameToStore));
        } else {
            $fileNameToStore = $post->cover_image;
        }

        //create post
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id =auth()->user()->id;//look to current user
        $post->cover_image = $fileNameToStore;
        $post->country_id = $request->input('country') + 1;
        $post->save();

        return redirect('/')->with ('success','post created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        // Check for correct user
        if(auth()->user()->id !==$post->user_id && auth()->user()->admin!==1){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
        if($post->cover_image != 'noImage.jpg'){
            // Delete Image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/dashboard')->with('success', 'Post Removed');

    }
}
