<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    public function get_user_list(){
      $client = new Client();
      $request = $client->get(env('API_PATH').'/trade_list', [
        'headers' => [
          'X-Authorization-Token' => md5(env('API_KEY')),
          'X-Authorization-Time'  => time()
        ]
      ]);

      $res = json_decode($request->getBody());

      $traders = $res->data;
      return view('test.trader',compact('res','traders'));
    }
}
