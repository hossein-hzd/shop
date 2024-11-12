<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index(){
    $products= Product::all();
    return view('admin.product.index',compact('products'));
   }
   public function edit($id){
    $product= Product::all()->find($id);
    return view('admin.product.edit',compact('product'));
   }

   public function update(Request $request,$id){

    $product=Product::all()->find($id);

    $request->validate([
        'name'=>'required',
        'price'=>'required',
        'number'=>'required',
        'status'=>'required',
   ]);

   $filename=time().'-'.$request->image->getClientOriginalName();
   $request->image->StoreAs('/images',$filename);

   $product->update([
    'image'=>$filename,
    'name'=>$request->name,
    'price'=>$request->price,
    'number'=>$request->number,
    'status'=>$request->status
   ]);
   return redirect()->route('product.index');
 }
 public function delete($id){
    Product::all()->find($id)->delete();
    return redirect()->route('product.index');
 }

   public function create(){
    return view('admin.product.create');
   }
   public function store(Request $request){
    $request->validate([
        'name'=>'required',
        'price'=>'required',
        'number'=>'required',
        'status'=>'required',

   ]);
   $filename=time().'-'.$request->image->getClientOriginalName();
   $request->image->StoreAs('/images',$filename);

   Product::create([
    'image'=>$filename,
    'name'=>$request->name,
    'price'=>$request->price,
    'number'=>$request->number,
    'status'=>$request->status
  ]);

   return redirect()->route('product.index');

   }
}
