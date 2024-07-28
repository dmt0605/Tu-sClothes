@extends('admin.layout_admin')
@section('title')
    Danh sách hoá đơn
@endsection
@section('body')
<div class="container-fluid p-4">
        <div class="d-flex justify-content-between">
            <h3 class="mb-4">Danh sách hóa đơn</h3>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Ngày đặt</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_fullname }}</td>
                        <td>{{ $order->user_email }}</td>
                        <td>{{ $order->user_phone }}</td>
                        <td>{{ $order->user_address }}</td>
                        <td>{{ number_format($order->total_money * $order->total_quantity) }} VNĐ</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.order_detail', $order->id) }}" class="btn btn-outline-info btn-sm">
                                <i class="fas fa-eye fa-fw"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection