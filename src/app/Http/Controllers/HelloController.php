<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function hello(Request $request): Response
    {
        $data = [
            'message' => 'Hello, World!',
        ];

        $resp = response($data, 200);
        $resp->header('Custom-Header', 'Custom-Value');

        return $resp;
    }

    public function forbidden(Request $request): Response
    {
        $data = [
            'message' => 'nay!',
        ];

        $resp = response($data, 403);

        return $resp;
    }
}
