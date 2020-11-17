<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeviceTokenController extends Controller
{
    public function send()
    {
        $id = $_POST['id'];

          preg_match("|\d+|", $id, $m);

          $user               = \App\Models\User::find($m[0]);

          $user->device_token = $_POST['token'];

          if($user->save()){
              return response()->json(['error'=>'true' ]);
          }
    }
}
