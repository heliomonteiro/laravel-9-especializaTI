<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class ApiExemplo
{
    private $api;
    public function __construct()
    {
        $this->api = Http::withHeaders([
            'Authorization' => 'Bearer',
        ]);
        //return Http::get('https://jsonplaceholder.typicode.com/posts')->json();
    }

    public function getApi()
    {
        return $this->api;
    }

}