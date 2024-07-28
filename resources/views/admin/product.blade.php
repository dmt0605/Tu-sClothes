@extends('admin.layout_admin')
@section('title')
Sản phẩm
@endsection
@section('body')
<div class="d-flex justify-content-between">
    <h3 class="mb-4">Products</h3>
    <div>
        <a href="#" class="btn btn-outline-success rounded-0">Manage Categories</a>
        <a href="{{route('admin.product.add')}}" class="btn btn-primary rounded-0">Add Product</a>
    </div>
</div>
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card border-0 rounded-0 bg-primary-subtle text-primary">
            <div class="card-body text-end">
                <div class="display-6 d-flex justify-content-between">
                    <i class="fal fa-box"></i>
                    {{$soSanPham}}
                </div>
                PRODUCTS
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card border-0 rounded-0 bg-danger-subtle text-danger">
            <div class="card-body text-end">
                <div class="display-6 d-flex justify-content-between">
                    <i class="fal fa-box-open"></i>
                    {{$soSapHet}}
                </div>
                RUNNING OUT
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card border-0 rounded-0 bg-success-subtle text-success">
            <div class="card-body text-end">
                <div class="display-6 d-flex justify-content-between">
                    <i class="fal fa-boxes"></i>
                    {{$soDanhMuc}}
                </div>
                CATEGORIES
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-4">
        <div class="card border-0 rounded-0 bg-dark-subtle text-dark">
            <div class="card-body text-end">
                <div class="display-6 d-flex justify-content-between">
                    <i class="fal fa-archive"></i>
                    0
                </div>
                ARCHIVE
            </div>
        </div>
    </div>
</div>

<div class="card rounded-0 border-0 shadow-sm">
    <div class="card-body">
        <table class="table text-center">
            <thead>
                <tr>
                    <th class="text-start" colspan="2">Product</th>
                    <th>Price</th>
                    <th>Instock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach ($dsSP as $sp)
                <tr>
                    <td style="width:64px">
                        <img src="{{asset('/')}}images/{{$sp->urlHinh}}" class="w-100">
                    </td>
                    <td class="text-start">
                        <strong>
                            {{$sp->tensp}}
                        </strong>
                        <br>
                        <small>
                            Id: <strong>{{$sp->id}}</strong> |
                            Category: <a href="#" class="text-decoration-none fw-bold">
                                            {{ $sp->idLoai }}
                                        </a>
                        </small>
                    </td>
                    <td>
                        {{number_format($sp->gia)}} VNĐ
                    </td>
                    <td>
                        {{$sp->soLuongTonKho}}
                    </td>
                    <td>
                        <a href="#" target="_blank" class="btn btn-primary btn-sm">
                            <i class="fas fa-eye fa-fw"></i>
                        </a>
                        <a href="#" class="btn btn-outline-warning btn-sm">
                            <i class="fas fa-pencil fa-fw"></i>
                        </a>
                        <a href="product/delete/{{$sp->id}}" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')" class="btn btn-outline-danger btn-sm">
                            <i class="fas fa-times fa-fw"></i>
                        </a>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
        {{$dsSP->links()}}
    </div>
</div>
@endsection