@extends('layout')
@section('tieudetrang')
Giỏ hàng
@endsection
@section('noidung1')

<!-- Start Hero Section -->

<div class="container">
  <div class="row justify-content-between">
    <div class="col-lg-5">
      <div class="intro-excerpt">
        <h1>Giỏ hàng</h1>
      </div>
    </div>
    <div class="col-lg-7">
    </div>
  </div>
</div>

<!-- End Hero Section -->
@endsection
@section('noidung')

<div class="untree_co-section before-footer-section">
  <div ng-if="cart.length>0" class="container">
    <div class="row mb-5">
      <form class="col-md-12" method="post">
        <div class="site-blocks-table">
          <table class="table">
            <thead>
              <tr>
                <th class="product-thumbnail">Ảnh</th>
                <th class="product-name">Tên</th>
                <th class="product-price">Giá</th>
                <th class="product-quantity">Số lượng</th>
                <th class="product-total">Tổng</th>
                <th class="product-remove">Xoá</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="sp in cart">
                <td class="product-thumbnail">
                  <img src="{{asset('/')}}images/@{{sp.urlHinh}}" alt="Image" class="img-fluid">
                </td>
                <td class="product-name">
                  <h2 class="h5 text-black">@{{sp.tensp}}</h2>
                </td>
                <td>@{{sp.gia|number}}VNĐ</td>
                <td>
                  <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">

                    <input type="number" ng-model="sp.quantity" ng-change="updateQuantity(sp.id, sp.quantity)"
                      class="form-control text-center quantity-amount" value="1"
                      aria-label="Example text with button addon" aria-describedby="button-addon1" min="1"
                      max="@{{sp.soLuongTonKho}}">

                  </div>

                </td>
                <td>@{{ sp.quantity * ((sp.gia)) | number}} VNĐ</td>
                <td><a href="javascript:void(0)" ng-click="deleteFromCart($index)" class="btn btn-black btn-sm">X</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="row mb-5">
          <div class="col-md-6">
            <button class="btn btn-outline-black btn-sm btn-block"><a class="text-white text-decoration-none"
                href="{{asset('/')}}">Tiếp tục mua sắm</a></button>
          </div>
        </div>
        <form action="" method="post">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <h2 class="h3 mb-3 text-black">Thông tin đặt hàng</h2>
              <div class="p-3 p-lg-5 border bg-white">
                <div class="form-group row">

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_fname" class="text-black">Fullname <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_fname" name="fullname"
                        value="{{(Auth::check() ? Auth::user()->name : '')}}">
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-md-12">
                      <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_address" name="address"
                        value="{{(Auth::check() ? Auth::user()->address : '')}}">
                    </div>
                  </div>

                  <div class="form-group row mb-3">
                    <div class="col-md-6">
                      <label for="c_email_address" class="text-black">Email Address <span
                          class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_email_address" name="email"
                        value="{{(Auth::check() ? Auth::user()->email : '')}}">
                    </div>
                    <div class="col-md-6">
                      <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_phone" name="phone"
                        value="0{{(Auth::check() ? Auth::user()->phone : '')}}">
                    </div>
                  </div>

                  <div class="d-flex">
                    <input type="checkbox" id="agree" name="agree" required>
                    <label class="p-2 mt-3" for="agree">
                      <p>Tôi Đã đọc và đồng ý tất cả các điều khoản của shop</p>
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 pl-5">
              <div class="row justify-content-end">
                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-12 text-right border-bottom mb-5">
                      <h3 class="text-black h4 text-uppercase">Tổng đơn hàng</h3>
                    </div>
                  </div>
                  <div class="row mb-5">
                    <div class="col-md-6">
                      <span class="text-black">Tổng:</span>
                    </div>
                    <div class="col-md-6 text-right">
                      <strong class="text-black">@{{totalCartMoney()|number}} VNĐ</strong>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-black btn-lg py-3 btn-block">Thanh toán</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
    </div>
    <div ng-if="cart.length==0" class="text-center fw-bolder" style="font-size: 40px;">
      Giỏ hàng đang trống!
      <br><br>
      <button class="btn btn-outline-black btn-sm btn-block"><a class="text-white text-decoration-none"
          href="{{asset('/product')}}">Quay lại mua sắm</a></button>
    </div>
  @endsection
  @section('viewFunction')
  <script>
    viewFunction = function ($scope, $http) {
      $scope.updateQuantity = function (id, quantity) {
        $http.patch('/api/cart/' + id, {
          quantity: quantity
        }).then(
          function (res) {
            // $scope.$parent.cart = res.data.data;
          }
        )
      }
    }
  </script>
  @endsection