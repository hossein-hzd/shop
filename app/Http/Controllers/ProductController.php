<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class ProductController extends Controller
{
   public function index(){
       $products= Product::paginate(3);
       return view('admin.product.index',compact('products'));
    }
    public function edit($id){
        $categories= Category::all();
        $product= Product::all()->find($id);
        // dd($product->date_on_sale_from,getJalaliDate( $product->date_on_sale_from));
    return view('admin.product.edit',compact('product','categories'));
   }
   public function show($id){
    $categories= Category::all();
    $product= Product::all()->find($id);
    return view('admin.product.show',compact('product','categories'));
   }

   public function update(Request $request,$id){

    $product=Product::all()->find($id);

    $request->validate([
        'name'=>'required',
        'price'=>'required',
        'number'=>'required',
        'status'=>'required',
   ]);

   $filename=Carbon::now()->microsecond.'-'.$request->image->getClientOriginalName();
   $request->image->StoreAs('/images/products',$filename);

    $imlist=[];
   foreach ($request->images as $image) {
    $imagename=Carbon::now()->microsecond.'-'.$image->getClientOriginalName();
   $image->StoreAs('/images/products',$imagename);
   array_push($imlist,$imagename);
   }
   $comma_separated = implode(",", $imlist);


   $product->update([
    'image'=>$filename,
    'images'=>$comma_separated,
    'name'=>$request->name,
    'price'=>$request->price,
    'number'=>$request->number,
    'sale_price'=>$request->sale_price,
    'is_sale'=>$request->price-$request->sale_price,
    'date_on_sale_from'=>$request->date_on_sale_from,
    'date_on_sale_to'=>$request->date_on_sale_to,
    'category_id'=>$request->category_id,
    'status'=>$request->status
   ]);
   return redirect()->route('product.index');
 }
 public function delete($id){
    Product::all()->find($id)->delete();
//    $t= Product::all()->find($id);
//    dd(slugyfy($t->name));
//    dd($t);
    return redirect()->route('product.index');
 }

   public function create(){
   $categories= Category::all();
    return view('admin.product.create',compact('categories'));
   }
   public function store(Request $request){
    $request->validate([
        'name'=>'required',
        'price'=>'required',
        'number'=>'required',
        'status'=>'required',

   ]);
   ////storing the image////
   if($request->image!=null)
   {$filename=Carbon::now()->microsecond.'-'.$request->image->getClientOriginalName();
   $request->image->StoreAs('/images/products',$filename);}
   else{
    $filename=null;
   }
   if($request->images!=null)
   { $imlist=[];
   foreach ($request->images as $image) {
    $imagename=Carbon::now()->microsecond.'-'.$image->getClientOriginalName();
   $image->StoreAs('/images/products',$imagename);
   array_push($imlist,$imagename);
   }
   $comma_separated = implode(",", $imlist);}
  else{
    $comma_separated=null;
  }
////////////////////////slugyfy
$s=slugyfy($request->name);
$ts= Product::all('name');
$n=sluw($s,$ts);
// dd($n);

///////////////////////

   Product::create([
    'image'=>$filename,
    'images'=>$comma_separated,
    'name'=>$n,
    'price'=>$request->price,
    'number'=>$request->number,
    'desc'=>$request->desc,
    'sale_price'=>$request->sale_price,
    'is_sale'=>$request->price-$request->sale_price,
    'date_on_sale_from'=>getJalaliDate($request->date_on_sale_from),
    'date_on_sale_to'=>getJalaliDate($request->date_on_sale_to),
    'category_id'=>$request->category_id,
    'status'=>$request->status
  ]);



   return redirect()->route('product.index');

   }
   public function menu(Request $request){
    $categories=Category::all();

        //  $products= Product::cat($request->category)->search($request->search)->paginate(3);
         $products=Product::sorta($request->sortby)->paginate(3);
        //  dd($products);
        //  $products=Product::all();
    return view('home.menupage',compact('products', 'categories'));
   }

   public function jav(Request $request){
    //    dd($request);
    $product=Product::all()->find(1);
       return response()->json(array('msg'=>$product,'name'=>$request->somefield), 200);
  }

   public function sef(Request $request){
    //    dd($request);
    $product=Product::search($request->somefield);
    dd($product);
       return response()->json(array('msg'=>$product,'name'=>$request->somefield), 200);
  }

}
