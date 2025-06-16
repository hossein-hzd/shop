<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));

     }
     public function create() {
        return view('admin.category.create');

     }
     public function store(Request $request){
         $request->validate([
             'title'=>'required',
             'status'=>'required',


        ]);

        Category::create([
             'title'=>$request->title,
             'status'=>$request->status,
         ]);

        return redirect()->route('category.index')->with('success','دسته بندی ساخته شد');
     }
     public function edit($id){
        $category=Category::all()->find($id);
       return view('admin.category.edit',compact('category'));

     }
     public function update(Request $request,$id){

         $category=Category::all()->find($id);

         $request->validate([
             'title'=>'required',
             'status'=>'required',

        ]);
        $category->update([
         'title'=>$request->title,
         'status'=> $request->status,

        ]);
        return redirect()->route('category.index')->with('error', 'دسته بندی تازه شد');
      }
      public function delete($id){
         $category=Category::all()->find($id)->delete();
         return redirect()->route('category.index')->with('warning', 'دسته بندی حذف شد');
      }


}
