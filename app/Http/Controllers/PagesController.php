<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Main;
use App\Models\Service;
use App\Models\Portfolio;

use Illuminate\Http\Request;

class PagesController extends Controller
{

  


    public function index(){
        //for one data
        $main = Main::first();
        //for all data
        $services = Service::all();
        $portfolios = Portfolio::all();
        $abouts = About::all();
    return view('pages.index',compact('main','services','portfolios','abouts'));
    }


   

       

}
