<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Storage;
use Image;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //Authorization
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=auth()->user()->id;
        $user=User::find($user_id);
        return view('dashboard')->with('posts',$user->posts);

    }

    public function GetImage($image=null)
    {
        return Image::make(storage_path("app/public/user_image/" . $image))->response();
    }


}
