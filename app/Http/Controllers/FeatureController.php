<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index() {
       $features=Feature::all();
       return view('admin.feature.index',compact('features'));

    }
    public function create() {
       return view('admin.feature.create');

    }
    public function store(Request $request){
        $request->validate([
            'title'=>'required',
            'text'=>'required',
            'icon'=>'required',

       ]);

        Feature::create([
            'title'=>$request->title,
            'text'=>$request->text,
            'icon'=>$request->icon,
        ]);

       return redirect()->route('feature.index');
    }
    public function edit($id){
       $feature=Feature::all()->find($id);
      return view('admin.feature.edit',compact('feature'));

    }
    public function update(Request $request,$id){

        $feature=Feature::all()->find($id);

        $request->validate([
            'title'=>'required',
            'text'=>'required',
            'icon'=>'required',
       ]);
       $feature->update([
        'title'=>$request->title,
        'text'=> $request->text,
        'icon'=>$request->icon,
       ]);
       return redirect()->route('feature.index');
     }
     public function delete($id){
        $feature=Feature::all()->find($id)->delete();
        return redirect()->route('feature.index');
     }
}
