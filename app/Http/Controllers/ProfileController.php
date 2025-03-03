<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\profile;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        return view('profile.index', compact('user'));
    }
    public function editepro(Request $request)
    {
        $user = Auth::user();

       return view('profile.editepro');
    }
    public function editeprof(Request $request)
    {
        $user = Auth::user()->id;
        $u = User::all()->find($user);

        $u->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        // dd($u->name);
       return redirect()->route('profile.index');
    }

    public function address()
    {
        $province = Province::all();
        $city = City::all();
        $userid = Auth::user()->id;
        $addresses=Profile::all()->where('user_id', $userid);

        return view('profile.address',compact('addresses', 'province', 'city'));
    }
    public function create()
    {   $pro=Province::all();
       $city=City::all();
        return view('profile.create',compact('pro','city'));
    }

    public function getcity(Request $request)
    {
        $city = City::all()->where('province_id',$request->x);
        return response()->json(array('msg' => $city), 200);
        // return response()->$city;
    }
    public function edite($id)
    {
        $pro = Province::all();
        $city = City::all();
        // $userid = Auth::user()->id;
        $address = Profile::all()->where('id', $id)->first();
        // dd($address);
        return view('profile.edite',compact('address', 'pro', 'city'));
    }
    public function store(Request $request)
    {    $userid = Auth::user()->id;
        $request->validate([
            'title' => 'required',
            'postal_code' => 'required',
            'cellphone' => 'required',
            'province_id' => 'required',
            'city_id' => 'required',
            'address' => 'required',
        ]);

        profile::create([
            'title' => $request->title,
            'postal_code' => $request->postal_code,
            'cellphone' => $request->cellphone,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'user_id' => $userid,
        ]);

        return redirect()->route('profile.address');
    }
    public function update(Request $request,$id)
    {
        $prof=profile::all()->find($id);
        $prof->update([
            'title' => $request->title,
            'postal_code' => $request->postal_code,
            'cellphone' => $request->cellphone,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
    ]);
        return redirect()->route('profile.address');
    }
}
