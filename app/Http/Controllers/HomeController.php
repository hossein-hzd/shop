<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
      $sliders=Slider::all();
      $features=Feature::all();
      return view('home.index',compact('sliders','features'));
    }
}
