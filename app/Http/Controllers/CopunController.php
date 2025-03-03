<?php

namespace App\Http\Controllers;

use App\Models\Copun;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CopunController extends Controller
{
    public function index()
    {
        $copuns = Copun::all();
        return view('admin.copun.index', compact('copuns'));
    }
    public function create()
    {
        return view('admin.copun.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'percentage' => 'required',
        ]);

        Copun::create([
            'code' => $request->code,
            'percentage' => $request->percentage,
        ]);

        return redirect()->route('copun.index');
    }
    public function edit($id)
    {
        $copun = Copun::all()->find($id);
        return view('admin.copun.edit', compact('copun'));
    }
    public function update(Request $request, $id)
    {

        $copun = Copun::all()->find($id);

        $request->validate([
            'code' => 'required',
            'percentage' => 'required',

        ]);
        $copun->update([
            'code' => $request->code,
            'percentage' => $request->percentage,

        ]);
        return redirect()->route('copun.index');
    }
    public function delete($id)
    {
        $copun = Copun::all()->find($id)->delete();
        return redirect()->route('copun.index');
    }
    public function check(Request $request)
    {
        $request->validate([
            'code' => 'required|exists:copuns,code|integer'
        ]);
        $selectedcopun = Copun::where('code', $request->code)->where('expired_at', '>', Carbon::now())->first();
        if ($selectedcopun) {
            $copun = ['code' => $selectedcopun->code, 'percentage' => $selectedcopun->percentage];
            session()->put('copun', $copun);
            return redirect()->route('cart.index');
        } else {

            return redirect()->route('cart.index')->with('warning', 'کد معتبر نیست');
            // dd($selectedcopun);
        }
    }
}
