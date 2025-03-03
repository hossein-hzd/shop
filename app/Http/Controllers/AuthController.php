<?php

namespace AppNotifications;
namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;

// use App\Http\Controllers\Controller;

// use App\Http\Controllers\Controller;
use CarbonCarbon;
use GhasedakDataTransferObjectsRequestInputDTO;
use GhasedaksmsGhasedaksmsLaravelMessageGhasedaksmsVerifyLookUp;
use GhasedaksmsGhasedaksmsLaravelNotificationGhasedaksmsBaseNotification;
use IlluminateBusQueueable;
use App\Models\User;
use Carbon\Carbon;
use Ghasedak\GhasedakApi;
use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use PhpParser\Node\Stmt\TryCatch;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{
    public function login() {
         
        return view('home.loginpage');
     }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.index');
    }

    public function loginform(Request $request) {

        //    dd($request->phone);
           $otp=rand(1000,10000);
            $logintoken=Hash::make('fgthyuij23hyhy');
        // dd($request);
            $user=User::where('phone','=',$request->phone)->first();

        // sendOtpSms('09375896861','2345');

  try{
     $request->validate([
                         'phone'=>'required|regex:/^[0][9][0-9]{9,9}$/'
                        ]);
     if($user==null){
                        User::create([
                            'phone'=>$request->phone,
                            'remember_token'=>$logintoken,
                            'otp'=>$otp
                          ]);
      }else{
        $user->update([

                            'remember_token'=>$logintoken,
                            'otp'=>$otp
        ]);
      }
        return response()->json(['msg'=>$otp,'toke'=>$logintoken,'cod'=>200]);
  }
  catch(\Exception $ex){
    return response()->json(['errors' => $ex->getMessage()]);
  }
     }

public function cofigure(Request $request){
   try{
    $request->validate([
        'otp'=>'required|exists:Users,otp|numeric',

       ]);
    $user=User::where("remember_token",$request->toke)->firstOrFail();
    // return response()->json(['msgh'=>$user]);
    if($user->otp==$request->otp){
     Auth::login($user);
     return response()->json(['msg'=>'کاربر با موفقیت وارد شد','cod'=>200]);
     }
     else{
        return response()->json(['msg'=>'!!!کاربر وارد نشد','cod'=>422]);

     }
    }catch(\Exception $ex){
        return response()->json(['errors' => $ex->getMessage()]);
      }
}



}
