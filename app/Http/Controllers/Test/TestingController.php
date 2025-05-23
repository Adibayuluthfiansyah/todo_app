<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function index()
    {
        $nama = 'Test';
        $data = ['nama' => $nama];
        return view('testing.tes', $data);
    }
}
