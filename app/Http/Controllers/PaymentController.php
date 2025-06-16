<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function send(){
   return "hiiii";
// $url = '{POST_REST_ENDPOINT}';

// $curl = curl_init();

// $fields = array(
//     'field_name_1' => 'Value 1',
//     'field_name_2' => 'Value 2',
//     'field_name_3' => 'Value 3'
// );

// $json_string = json_encode($fields);

// curl_setopt($curl, CURLOPT_URL, $url);
// curl_setopt($curl, CURLOPT_POST, TRUE);
// curl_setopt($curl, CURLOPT_POSTFIELDS, $json_string);
// curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );

// $data = curl_exec($curl);

// curl_close($curl);
    }
}
