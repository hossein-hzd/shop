<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Mockery\Matcher\IsEqual;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isList;
use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    public function increment(Request $request,$id){

        $x = session()->get('cart');
        $r=$request->title;
        $f = [];
        if (isset($x)) {
            foreach ($x as $keyid => $value) {
                if($id== key($value)){
                    $x[$keyid][$id]['qty'] = $r;
                }

            }

        }

        // dd($request->title);
        return view('home.cart', compact('x'));

    }
    public function add($id){
        // dd($request->title,$id);
        $product=product::all()->find($id);
        // $arr = array(1 => 'salam', 2 => 'salam', 3 => 'salam', 4 => 'hello', 5 =>'hello', 6 => 'hello');

         //    dd($product->id);
         $x=session()->get('cart', []);
        //  dd($x);

        // if(!isNull(session()->get('cart')) )
        // dd(array_values(session()->get('cart')));
        //  {
        // foreach (session()->get('cart') as $keyid => $value) {
        //     if ($id==$keyid) {
        //     dd($value);

        //         // $value['qty'] = +1;
        //     }
        //     }
        // }else{
    //     if($x!=[]){


    //         if ($id == key($value) && isset($value[$id])){

    //             $a=session()->get('cart')[$keyid][$id]['qty'];
    //             $a++;
    //             // dd('qtyuuu++');
    //                 $cart[$product->id] = [
    //                     'name' => $product->name,
    //                     'image' => $product->image,
    //                     'number' => $product->number,
    //                     'is_sale' => $product->is_sale,
    //                     'price' => $product->price,
    //                     'qty' => $a,
    //                 ];
    //                 // break;
    //         //      $a++;
    //         //     $cart[$product->id] = $a;
    //         // session()->push('cart', $cart);
    //         }
    //        elseif (!isset($value[$id])) {
    //         //    dd('add');
    //         $cart[$product->id] = [
    //                     'name' => $product->name,
    //                     'image' => $product->image,
    //                     'number' => $product->number,
    //                     'is_sale' => $product->is_sale,
    //                     'price' => $product->price,
    //                     'qty' => 1,
    //                 ];

    //        }

    //     }
    //  }else{
            $cart[$product->id]= [
                'name' => $product->name,
                'image' => $product->image,
                'number' => $product->number,
                'is_sale' => $product->is_sale,
                'price' => $product->price,
                'qty' => 1,
            ];
    //     }

        //    dd( session()->get('cart')[1][$product->id]['qty']);
        // dd($cart);
        // session(['cart' => $cart]);
        // $cart[$product->id]['qty']+=1;

        session()->push('cart', $cart);

        $x = session()->get('cart');
        $f = [];
        if (isset($x)) {
            foreach ($x as $keyid => $value) {
                array_push($f, key($value));

            }
            $z = array_count_values($f);
            foreach ($x as $keyid => $value) {
                foreach($z as $i=>$v){
                  if(key($value)==$i){
                    $x[$keyid][$i]['qty']=$v;
                  }
                }
            }
        }

        // session()->forget('cart');
        // dd($x);
        // $c = array_count_values(session()->get('cart'));

        // dd($c);
       return redirect()->back()->with('succ','اضافه شد!!!!');

    //    return redirect()->back();
    }
    public function index(){

        $x = session()->get('cart');
        $f = [];
        if (isset($x)) {
            foreach ($x as $keyid => $value) {
                array_push($f, key($value));
            }
            $z = array_count_values($f);
            foreach ($x as $keyid => $value) {
                foreach ($z as $i => $v) {
                    if (key($value) == $i) {
                        $x[$keyid][$i]['qty'] = $v;
                    }
                }
            }
        }
       return view('home.cart',compact('x'));

    }
    public function delete($id){
        $x = session()->get('cart');
        // dd(session()->pull($id));
        foreach ($x as $keyid => $value) {
            // array_push($f, key($value));
            if(key($value)==$id){

                unset($x[$keyid]);
                session()->put('cart', $x);
            }
        }


       return view('home.cart',compact('x'));

    }
    public function remove(){
                session()->forget('cart');

        return view('home.cart');

    }
}
