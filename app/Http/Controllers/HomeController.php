<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function home() {
        $sanpham = DB::table('products')
        ->select('id', 'tensp', 'gia', 'urlHinh')
        ->limit(3)
        ->get();
        return view('home', ['sanpham'=>$sanpham]);
    }
}
