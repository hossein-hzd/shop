<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
  public function index(){
    return view('admin.about.index');
  }
  public function create(){
    return view('admin.about.create');
  }
  public function edite($id){
    return view('admin.about.edit',compact('id'));
  }
  public function update(Request $request,$id){
    $request->validate([
        'title'=>'required',
        'descript'=>'required',
        'link'=>'required|',

   ]);
$about=About::all()->find($id);

$about->update([
    'title'=>$request->title,
    'descript'=>$request->descript,
    'link'=>$request->link,
   ]);
    return redirect()->route('about.index');
  }

  public function store(Request $request){
    $request->validate([
        'title'=>'required',
        'descript'=>'required',
        'link'=>'required|',

   ]);

    About::create([
        'title'=>$request->title,
        'descript'=>$request->descript,
        'link'=>$request->link,
    ]);
    return view('admin.about.index');


  }
}
