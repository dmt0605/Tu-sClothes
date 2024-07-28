<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('tieudetrang')
    </title>
    <link rel="shortcut icon" href="logo.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/tiny-slider.css')}}">
</head>
<style>
    .quantity-buttons {
        display: flex;
        align-items: center;
    }

    .quantity-buttons button {
        width: 40px;
        height: 40px;
    }

    .quantity-input {
        width: 60px;
        text-align: center;
    }
</style>

<body ng-app="tcApp" ng-controller="tcCtrl">
    <div class="preloader">
            @include('loader')
        </div>
    <nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark fixed-top mb-3" arial-label="Tu's Clothes">
        @include('header')
    </nav>

    <div class="hero mt-5" ng-controller="viewCtrl">
        @yield('noidung1')
    </div>

    <div class="bg-info" ng-controller="viewCtrl">
        @yield('noidung2')
    </div>


    <main ng-controller="viewCtrl">
        @yield('noidung')
    </main>
    <br><br><br>
    <div class="footer">
        @include('footer')
    </div>
</body>
<script src="{{asset('js/angular.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/tiny-slider.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script>
    document.getElementById('decrease').addEventListener('click', function () {
        var quantityInput = document.getElementById('quantity');
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    });

    document.getElementById('increase').addEventListener('click', function () {
        var quantityInput = document.getElementById('quantity');
        var currentValue = parseInt(quantityInput.value);
        quantityInput.value = currentValue + 1;
    });
</script>
<script>
    window.onload = function () {
      window.setTimeout(fadeout, 500);
    }

    function fadeout() {
      document.querySelector('.preloader').style.opacity = '0';
      document.querySelector('.preloader').style.display = 'none';
    }
  </script>
<script>
    var app=angular.module('tcApp', []);
    app.controller('tcCtrl', function($scope, $http){
        $scope.cart = {!! json_encode(session()->get('cart')) !!} || [];
        $scope.addToCart =function(product_id, quantity){
            $http.post('/api/cart',{
                product_id: product_id,
                quantity: quantity,
            }).then(function(res){
                $scope.cart = res.data.data;
                alert('Thêm sản phẩm thành công!');
            })
        }
        $scope.totalCartMoney =function(){
            var total = 0;
            $scope.cart.forEach(sp=> {
                total += sp.quantity * sp.gia;
            });
            return total;
        }
        $scope.deleteFromCart =function($index){
            $http.delete('/api/cart/'+$index).then(function(res){
                $scope.cart = res.data.data;
            });

        }
    });
    var viewFunction =function($scope){}
</script>
@yield('viewFunction')
<script>
    app.controller('viewCtrl', viewFunction);
</script>

</html>