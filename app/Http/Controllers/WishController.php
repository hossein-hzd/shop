<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishController extends Controller
{
    public function store($id){
        //  $p=product::all()->find($id);
        //  dd($p);
 $userid = Auth::user()->id;
         Wish::firstOrCreate([
            'product_id' =>$id,
            'user_id' => $userid
        ]);
        return redirect()->back()->with('success', 'okkkk');
    }

    public function delete($id){
        $userid = Auth::user()->id;
        Wish::where('user_id', $userid)->where('product_id',$id)->delete();
        return redirect()->route('wish.index');

    }

    public function index(){
        $userid = Auth::user()->id;
        $producs=Product::all();
       $product_ids=Wish::all()->where('user_id', $userid)->pluck('product_id');
    //    dd($wishes);
        return view('profile.wishes.index',compact('product_ids', 'producs'));
    }
}
