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

    public function contact(){
        // $categories= Category::all();
        // $product= Product::all()->find($id);
        return view('home.contact');
       }
}
