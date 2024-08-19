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
        $viewData = ["title" => "About us - Online Store", "subtitle" => "About us", "description" => "This is an about page ...", "author" => "Developed by: Kristian Restrepo Osorio"];
        return view('home.about')->with("viewData", $viewData);
    }

    public function contact(): View
    {
        $viewData = ["title" => "Contact us - Online Store", "subtitle" => "Contact us", "email" => "onlinestore@gmail.com", "address" => "13th Street. 47 W 13th St, New York, NY 10011, USA", "phoneNumber" => "3244135434"];
        return view('home.contact')->with("viewData", $viewData);
    }       
}
