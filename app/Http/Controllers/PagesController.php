<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Post;
use PDF;

class PagesController extends Controller
{
    public function index()
    {
        $title = "Welcome to Travelo";
        // return view('pages.index',compact('title'));
        $countries = Country::all();
        return view('pages.index')->with('countries', $countries);
    }


    public function  adminpanel(){
        $title="Admin";
         // return view('pages.index',compact('title'));
        return view('pages.adminpanel')->with('title',$title);
    }

    public function  articles(){
        $title="articles";
        // return view('pages.about',compact('title'));
        return view('pages.articles')->with('title',$title);
    }

    public function getPostsByCountry($id) {
        $posts= post::where('country_id', $id)->paginate(10);
        return view('posts.index')->with ('posts',$posts);
    }

    public function getPdf($id){
        $post = Post::find($id);
        $pdf = PDF::loadView('pdf', ['post'=>$post]);
        return $pdf->download($post->title . '.pdf');
    }
}
