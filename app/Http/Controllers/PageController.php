<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($id = 'shnaaa')
    {
        return '***' . $id .  '***';
    }

    public function test($test)
    {
        return view('test', ['test' => $test]);
    }
}
