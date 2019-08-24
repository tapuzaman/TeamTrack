<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller


//controller for contact page

{
    public function contact(){

        return view('contact');
    }

    public function about(){

        return view('about');
    }
}
