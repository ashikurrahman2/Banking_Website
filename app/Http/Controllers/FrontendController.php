<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
       
        return view('frontend.pages.home');
    }

    public function submission(){
        return view('frontend.pages.loan_item');
    }

}
