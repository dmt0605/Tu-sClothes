<div class="container">
	<a href="/" class="navbar-brand"><img src="{{asset("logo.png")}}" width="50px" alt=""></a>
	<a class="navbar-brand" href="/">Tu's Clothes<span>.</span></a>
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
		aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarsFurni">
		<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
			<li class="nav-item active">
				<a class="nav-link" href="{{asset('/')}}">Trang chủ</a>
			</li>
			<li><a class="nav-link" href="{{asset('/product')}}">Sản phẩm</a></li>
			<li><a class="nav-link" href="{{ asset('/about') }}">Về chúng tôi</a></li>
		</ul>
		


		@if (Route::has('login'))
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					@auth
						<div class="dropdown text-end">
							<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle text-white"
								id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="{{asset('/')}}images/{{'duongtu.jpg'}}" alt="mdo" width="40" height="40" class="rounded-circle">
								Xin chào, {{ Auth::user()->name }}
							</a>
							<ul class="dropdown-menu" aria-labelledby="dropdownUser1">
								<li class="dropdown-item">
									<a href="{{ asset('profile') }}" class="text-decoration-none">Thông tin cá nhân</a>
								</li>
								<li>
									<form method="POST" action="{{ route('logout') }}">
										@csrf
										<x-responsive-nav-link :href="route('logout')"
											onclick="event.preventDefault(); this.closest('form').submit();"
											class="text-decoration-none text-body-tertiary">
											{{ __('Đăng xuất') }}
										</x-responsive-nav-link>
									</form>
								</li>
							</ul>
						</div>
					@else
						<a href="{{ route('login') }}" class="btn">
							Đăng nhập
						</a>

						@if (Route::has('register'))
							<a href="{{ route('register') }}" class="btn">
								Đăng ký
							</a>
						@endif
					@endauth
				</li>
			</ul>
		@endif
		<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-3">
			<li><a class="nav-link" href="{{ asset('cart') }}"><img src="{{ asset('/') }}images/cart.svg"></a></li>
		</ul>
	</div>
</div>