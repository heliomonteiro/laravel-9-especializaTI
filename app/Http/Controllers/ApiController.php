<?php

namespace App\Http\Controllers;

use App\Facades\ApiExample;
use App\Helpers\ApiExemplo;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function __invoke()
    {
        //return (new ApiExemplo())->getApi() 
        //    ->get('https://jsonplaceholder.typicode.com/posts')
        //    ->json();
        dd(ApiExample::get('/posts/1')->json());
    }
}