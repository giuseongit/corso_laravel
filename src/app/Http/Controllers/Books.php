<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Books extends Controller
{
    public function show(Request $request)
    {
        $books = DB::table('books')->get();

        return response($books, 200);
    }
}
