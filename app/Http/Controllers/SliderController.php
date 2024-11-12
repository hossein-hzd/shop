<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function create(){
        return view('slider.create');
    }
    public function edit($id){
        $slider= Slider::all()->find($id);
        return view('slider.edit',compact('slider'));
        // return dd($id);
    }
    public function update($id,Request $request){

        $slider= Slider::all()->find($id);
        $slider->update([
            'title'=>$request->title,
            'body'=> $request->body,
            'link_title'=>$request->link_title,
            'link_address'=>$request->link_address
        ]);
        return redirect()->route('slider.index');

    }
    public function delete(Slider $id){

        $id->delete();

        return redirect()->route('slider.index');

    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required',
             'body'=>'required',
            'link_title'=>'required',
            'link_address'=>'required'
       ]);

        Slider::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'link_title'=>$request->link_title,
            'link_address'=>$request->link_address
           ]);
    return redirect()->route('slider.index')->with('success','okkkk');
    }
    public function index(){
       $sliders= Slider::all();
        return view('slider.index',compact('sliders'));
    }
}
