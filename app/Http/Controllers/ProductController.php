<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function product() {
        $sanpham = DB::table('products')
        ->select('id', 'tensp', 'gia', 'urlHinh')
        ->limit(500)
        ->orderBy('id', 'asc')
        ->paginate(12);

        return view('product', ['data'=>$sanpham]);
    }
    function detail($id=0) {
        $productdetail = DB::table('products')
        ->select('id', 'urlHinh', 'tensp', 'gia', 'soLuongTonKho', 'moTa')
        ->where('id', $id)
        ->first();
        $data = ['id'=>$id, 'sp'=>$productdetail];
        return view('detail', $data);
    }
}
