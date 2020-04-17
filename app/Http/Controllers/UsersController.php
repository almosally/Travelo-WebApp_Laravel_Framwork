<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use function GuzzleHttp\Psr7\_parse_message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use Storage;
use DB;
use App\Http\Resources\User as UserResource;

class UsersController extends Controller
{
    public function profile(){
        $user = Auth::user();
        return view('dashboard')->with('user', $user);
    }

    public function editProfile(){
        $user = Auth::user();
        return view('editProfile')->with('user', $user);
    }

    public function updateProfile(Request $request){

        //Validate data
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'user_image' => 'image|nullable|max:1999'
        ]);

        //Get logged user
        $user = Auth::user();

        //Update user information
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        //Check if file is selected, process it and save the filename in the database
        if($request->hasFile('user_image')){
            $file = $request->file('user_image');
            $filename = $user->id . '_' . time() . '.' . $file->getClientOriginalExtension(); //"{$user->id}_{time()}.{$file->getClientOriginalExtension()}"
            Image::make($file)->resize(300, 300)->insert(storage_path("app/public/cover_images/watermark.png"))->save(storage_path("app/public/user_image/" . $filename));

            //delete old file if not default one
            if($user->image != 'userPic.png'){
                Storage::disk('public')->delete('user_image/' . $user->image);
            }

            //Update filename
            $user->image = $filename;
        }

        //Save user
        $user->save();

        return redirect('/dashboard');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $posts = Post::where('user_id', $user->id)->get();
        foreach ($posts as $post) {
            $post->delete();
        }
        $user->delete();
        return redirect()->intended('/adminpanel');


    }
    public function setadmin($id)
    {
        $user = User::find($id);
        if ($user->admin == 1) {
            $user->admin = 0;
        } else {
            $user->admin = 1;
        }
        $user->save();
        return redirect('/adminpanel')->with('message', 'User permission changed');
    }

}

