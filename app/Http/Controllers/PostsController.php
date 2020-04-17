<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

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
        $posts= post::orderBy('created_at','asc')->paginate(10); //make pages number to scrol
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
     ])   ;
     //create post
        $post=new Post;
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->user_id =auth()->user()->id;//look to current user
        $post->save();

        return redirect('posts')->with ('success','post created');
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
        ])   ;
        //create post
        $post=Post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
       // $post->user_id =auth()->user()->id;//look to current user
        $post->save();

        return redirect('posts')->with ('success','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect('posts')->with('success','Post Removed');

    }
}
