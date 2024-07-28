<div>
    <!-- Walk as if you are kissing the Earth with your feet. - Thich Nhat Hanh -->
</div>
@extends('layout')
@section('tieudetrang')
    Chi tiết
@endsection

@section('noidung')
<div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-6">
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{asset("images/$sp->urlHinh")}}" class="d-block w-100" alt="Sản phẩm {{$sp->id}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <h1 class="product-title">{{$sp->tensp}}</h1>
                <p class="product-price text-danger fs-4">{{number_format($sp->gia)}} VND</p>
                
                <div class="quantity-buttons d-flex mb-5 mt-5 align-items-center">
                    <button class="btn btn-outline-secondary" type="button" id="decrease">-</button>
                    <input type="number" class="form-control quantity-input" id="quantity" value="1" min="1" max="{{$sp->soLuongTonKho}}">
                    <button class="btn btn-outline-secondary" type="button" id="increase">+</button>
                </div>
                <button class="border border-0 btn-white-outline" ng-click="addToCart({{$sp->id}}, 1)"><a class="btn btn-primary" href="javascript:void(0)">Thêm vào giỏ hàng</a></button>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h2>Mô Tả Sản Phẩm</h2>
                <p class="product-description fs-5">
                    {{$sp->moTa}}
                </p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <h2>Đánh giá sản phẩm</h2>
                <div class="form-floating">
                    <textarea class="form-control" ng-model="content" placeholder="Viết đánh giá tại đây" id="floatingTextarea2"></textarea>
                    <label for="floatingTextarea2">Comments</label>
                </div>
                <button class="btn mt-2" type="submit" ng-click="sendComment()">Gửi đánh giá</button>
            </div>
            <div class="col-md-12">
            <div class="be-comment-block">
                <h1 class="comments-title">Comments</h1>
                <div class="be-comment" ng-repeat="bl in dsBL">
                    <div class="be-img-comment">	
                        <a href="#">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
                        </a>
                    </div>
                    <div class="be-comment-content">
                        
                            <span class="be-comment-name">
                                @{{bl.user_fullname}}
                            </span>
                            <span class="be-comment-time">
                                <i class="fa fa-clock-o"></i>
                                @{{bl.created_at | date:'dd/MM/yyyy HH:mm:ss'}}
                            </span>

                        <p class="be-comment-text">
                            @{{bl.content}}
                        </p>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('viewFunction')
<script>
    viewFunction =function($scope, $http){
        $scope.dsBL = [];
        $scope.getComment = function(){

            $http.get('/api/comments/product/{{$sp->id}}').then(
                function(res){//Thành công
                    $scope.dsBL = res.data.data;
                    console.log($scope.dsBL);
                },
                function(res){//Thất bại
    
                }
            );
        }
        $scope.getComment();
        $scope.sendComment =function(){
            $http.post('/api/comments', {
                'product_id': {{$sp->id}},
                'content': $scope.content,
            }).then(
                function(res){
                    $scope.content='';
                }
            )
        }
    }
</script>

@endsection
