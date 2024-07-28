<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $soDonHang = Order::count();
        $soSanPham = Product::count();
        $soKhachHang = User::where('role', '0')->count();
        $doanhThu = Order::where('status', 'success')->sum('total_money');

        $dsDH = Order::orderBy('created_at', 'DESC')->limit(5)->get();
        $dsBL = Comment::orderBy('created_at', 'DESC')->limit(5)->get();

        $tkDoanhThu = Order::where('status', 'success')->groupByRaw('YEAR(created_at), MONTH(created_at)')->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_money) as total')->get();

        return view('admin.home', compact(['soDonHang', 'soSanPham', 'soKhachHang', 'doanhThu', 'dsDH', 'tkDoanhThu', 'dsBL']));//Có bình luận thì thêm 'dsBL'
    }

    public function product(){
        $dsSP = Product::paginate(10);
        $soSanPham = Product::count();
        $soSapHet = Product::where('soLuongTonKho', '<=', 30)->count();
        $soDanhMuc = Category::count();
        return view('admin.product', compact('dsSP', 'soSanPham', 'soSapHet', 'soDanhMuc'));
    }


    public function productAdd() {
        $dsDM = Category::get();
        return view('admin.product_add', compact('dsDM'));
    }

    public function postproductAdd(Request $request){
        //Kiểm tra lỗi các input nhập lên
        $product = new Product();
        $product->tensp = $request->tensp;
        $product->moTa = $request->moTa;
        $product->soLuongTonKho = $request->soLuongTonKho;
        $product->idLoai = $request->idLoai;
        $product->gia = $request->gia;
        $product->urlHinh = '';
        $product->save();


        //Upload ảnh
        if($request->hasFile('urlHinh')){
            $img = $request->file('urlHinh');
            $imgName = "{$product->id}.{$img->getClientOriginalExtension()}";
            $img->move(public_path('images/'), $imgName);
            $product->urlHinh = $imgName;
            $product->save();
        }

        return redirect()->route('admin.product');
    }


    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.product');
    }


    public function order(){
        $orders = Order::all();

        return view('admin.order', compact('orders'));
    }
    

    public function order_detail($id) {
        $order = Order::findOrFail($id);
        $order_pro = Product::findOrFail($id);
        return view('admin.order_detail', compact('order', 'order_pro'));
    }


    public function user() {
        $User = User::get();
        return view('admin.user', compact('User'));
    }
}
