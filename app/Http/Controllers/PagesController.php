<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function  index(){
        $title="Welcome to Travelo";
       // return view('pages.index',compact('title'));
        return view('pages.index')->with('title',$title);
    }
    public function  about(){
        $title="about";
      // return view('pages.about',compact('title'));
        return view('pages.about')->with('title',$title);
    }
    public function  services(){
        $data=array(
            'title'=> 'Services',
            'services'=> ['France','Netherlands','Germany']
        );
        // return view('pages.index',compact('title'));
        return view('pages.services')->with($data);
    }
    public function  register(){
        $title="register";
         // return view('pages.index',compact('title'));
        return view('pages.register')->with('title',$title);
    }

    public function  articles(){
        $title="articles";
        // return view('pages.about',compact('title'));
        return view('pages.articles')->with('title',$title);
    }
}
