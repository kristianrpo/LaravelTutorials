<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function about(): View
    {
        $data = ["title" => "About us - Online Store", "subtitle" => "About us", "description" => "This is an about page ...", "author" => "Developed by: Kristian Restrepo Osorio"];
        return view('home.about')->with("data", $data);
    }
}
