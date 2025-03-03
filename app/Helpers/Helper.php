<?php

use Ghasedak\GhasedakApi;
use Hekmatinasser\Verta\Facades\Verta;

use function PHPUnit\Framework\isNull;

// function las() : Returntype {

// }

function getJalaliDate($date){

   $t=Verta::parse($date)->datetime();
    return $t;
}

function slugyfy($name){
 $slugylist=explode(' ',$name);
 return implode('-',$slugylist);
}

function sluw($inputt,$pronames){
    $lis=[];
    foreach($pronames as $proname){
        $d=explode('-',$proname['name']);
        if(is_numeric(end($d))){
            array_pop($d);
           $s=implode('-',$d);
           array_push($lis, $s);
        }
        else{
            $s=implode('-',$d);
            array_push($lis,$s);
        };
    }
    $a=1;
   foreach($lis as $W){
    if($W==$inputt){
      $a++;
    }
   }
   return $inputt.'-'.$a;
}
function percent($price,$sprice){
    if($price!=0)
   {$h=(($price-$sprice)/$price)*100;
     return round($h) . '%';
}
else{
    return 'مخرج نباید 0 باشد';
}

}

function sendOtpSms($cellphone, $opt)
{
    // return 'Done!';

    $api = new GhasedakApi(env('GHASEDAKAPI_KEY'));

    $api->Verify(
        $cellphone,  // receptor
        1,           // 1 for text message and 2 for voice message
        "otp",       // name of the template which you've created in you account
        $opt,        // parameters (supporting up to 10 parameters)
    );
}
?>
