<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        
        $title = 'Welcome to My AstonEvents';
        //this looks inside the pages folder to find, the index file and it render it.
        //second line pass the variable title
        return view('pages.index')->with('title',$title);
    }
}
