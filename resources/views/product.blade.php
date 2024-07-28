@extends('layout')
@section('tieudetrang')
    Tất cả sản phẩm
@endsection
@section('noidung1')

<!-- Start Hero Section -->

<div class="container">
	<div class="row justify-content-between">
		<div class="col-lg-5">
			<div class="intro-excerpt">
				<h1>Sản phẩm</h1>
			</div>
		</div>
		<div class="col-lg-7">

		</div>
	</div>
</div>

<!-- End Hero Section -->
@endsection


@section('noidung')


<div class="untree_co-section product-section before-footer-section">
	<div class="container">
		<div class="row">

			@foreach ($data as $s)
				<div class="col-12 col-md-4 col-lg-3 mb-5">
					<a class="product-item" href="{{ route('productdetail', $s->id) }}">
						<img src="{{asset("images/$s->urlHinh")}}" class="img-fluid product-thumbnail" style="height: 300px;">
						<h3 class="product-title">{{$s->tensp}}</h3>
						<strong class="product-price">{{number_format($s->gia)}} VND</strong>

						<span class="icon-cross">
							<img src="{{asset("images/cross.svg")}}" class="img-fluid">
						</span>
					</a>
				</div>
			@endforeach


		</div>
		<div class="text-center">
			{!! $data->links() !!}
		</div>
	</div>
</div>

@endsection