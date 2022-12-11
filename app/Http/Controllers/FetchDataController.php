<?php

namespace App\Http\Controllers;

use App\Models\User;
use bugloos\bugloosdto\BugloosDto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FetchDataController extends Controller
{
    public function getConfig()
    {
        $url = 'http://localhost/beautiplus/api/public/api/get-config';
        $url = 'https://reqbin.com/echo/get/xml';
        $url = 'https://www.w3schools.com/xml/tempconvert.asmx';
        $response = Http::withoutVerifying()->
        post($url);


        $dto = new BugloosDto( $response ,User::class);
        $obj = $dto->map(
            [
//            'title'=>index or value or func or computed or ....,
              'description'=>'text',
              'title' => 'title',
            ]
        )->getObj();



        dd($obj);


    }
}
