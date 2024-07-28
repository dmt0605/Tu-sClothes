@extends('layout')
@section('tieudetrang')
Trang chủ
@endsection
@section('noidung1')

<div class="container">
	<div class="row justify-content-between">
		<div class="col-lg-7">
			<div class="intro-excerpt">
				<h1>Chào mừng bạn <span clsas="d-block">Đến với Tu's Clothes</span></h1>
				<p class="mb-4">Dù tốt dù xấu, hãy là chính bạn. Hãy tự tin khoác lên mình một phong cách thật hoàn hảo.
				</p>
				<p><a href="/product" class="btn btn-secondary me-2">Mua ngay</a><a href="/about"
						class="btn btn-white-outline">Khám phá</a></p>
			</div>
		</div>
		<div class="col-lg-5">
			<div class="hero-img-wrap">
				<img src="images/home_shirt1.png" width="500px" class="img-fluid">
			</div>
		</div>
	</div>
</div>


@endsection
@section('noidung')
<div class="product-section">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
				<h2 class="mb-4 section-title">Được chế tạo bằng vật liệu tuyệt vời.</h2>
				<p class="mb-4">Chất liệu vải mà Tu's Clothes sử dụng thường rất đa dạng và được chọn lựa kỹ lưỡng để
					phù hợp với xu hướng thời trang hiện đại, đồng thời đảm bảo sự thoải mái và bền bỉ cho người mặc.
				</p>
				<p><a href="/product" class="btn">Xem các sản phẩm</a></p>
			</div>

			@foreach ($sanpham as  $data)
			<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
				<a class="product-item" href="{{ route('productdetail', $data->id) }}">
					<img src="{{asset("images/$data->urlHinh")}}" class="img-fluid product-thumbnail" style="height: 300px;">
					<h3 class="product-title">{{$data->tensp}}</h3>
					<strong class="product-price">{{number_format($data->gia)}} VND</strong>

					<span class="icon-cross">
						<img src="images/cross.svg" class="img-fluid">
					</span>
				</a>
			</div>
			@endforeach

			

		</div>
	</div>
</div>


<div class="why-choose-section">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-6">
				<h2 class="section-title">Tại sao chọn chúng tôi</h2>
				<p>Chúng tôi vô cùng hạnh phúc khi cung cấp dịch vụ cho nhiều khách hàng tin tưởng vào các dịch vụ sạch
					sẽ và đáng tin cậy nhất của chúng tôi.</p>

				<div class="row my-5">
					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/truck.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Giao hàng nhanh chóng &amp; Tiện lợi</h3>
							<p>Chúng tôi cũng cung cấp chính sách miễn phí vận chuyển cho các đơn hàng trên một mức giá
								trị nhất định. Điều này giúp bạn tiết kiệm chi phí và tận hưởng trải nghiệm mua sắm
								tuyệt vời.</p>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/bag.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Dễ dàng đặt hàng</h3>
							<p>Chúng tôi luôn mong muốn đem đến trải nghiệm mua sắm trực tuyến mượt mà và dễ dàng cho
								bạn</p>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/support.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Hỗ trợ 24/7</h3>
							<p>Với dịch vụ hỗ trợ 24/7, chúng tôi cam kết mang đến trải nghiệm mua sắm trực tuyến tuyệt
								vời và thuận tiện nhất cho mọi khách hàng.</p>
						</div>
					</div>

					<div class="col-6 col-md-6">
						<div class="feature">
							<div class="icon">
								<img src="images/return.svg" alt="Image" class="imf-fluid">
							</div>
							<h3>Hoàn phí nhanh chóng</h3>
							<p>Việc cung cấp một chính sách hoàn phí rõ ràng và chi tiết giúp bạn yên tâm mua sắm tại
								Tu's Clothes.</p>
						</div>
					</div>

				</div>
			</div>

			<div class="col-lg-5">
				<div class="img-wrap">
					<img src="images/chinhsach.png" alt="Image" class="img-fluid">
				</div>
			</div>

		</div>
	</div>
</div>


<div class="we-help-section">
	<div class="container">
		<div class="row justify-content-between">
			<div class="col-lg-7 mb-5 mb-lg-0">
				<div class="imgs-grid">
					<div class="grid grid-1"><img src="images/chinhsach3.jpg" alt="TClothes.co"></div>
					<div class="grid grid-2"><img src="images/chinhsach1.png" alt="TClothes.co"></div>
					<div class="grid grid-3"><img src="images/chinhsach.png" alt="TClothes.co"></div>
				</div>
			</div>
			<div class="col-lg-5 ps-lg-5">
				<h2 class="section-title mb-4">Chúng tôi sẽ mang đến cho bạn những phong cách đa dạng và phù hợp với mọi
					người</h2>
				<p>Tu's Clothes luôn nâng cấp mẫu mã liên tục và mang đến cho khách hàng những sản phẩm đa phong cách.
					Tất cả sản phẩm tại Tu's Clothes luôn phù hợp với xu hướng của giới trẻ hiện nay.</p>

				<ul class="list-unstyled custom-list my-4">
					<li>Định hướng phong cách của thương hiệu</li>
					<li>Sứ mệnh và giá trị cốt lõi của thương hiệu</li>
					<li>Thương hiệu thời trang đáng mua</li>
					<li>Phù hợp với mọi giới tính</li>
				</ul>
				<p><a herf="/blog" class="btn">Khám phá ngay</a></p>
			</div>
		</div>
	</div>
</div>


<div class="popular-product">
	<div class="container">
		<div class="row">

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="images/home_shirt.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Áo khoác</h3>
						<p>Chất liệu vải cotton cao cấp giữ ấm tốt vào mùa lạnh </p>
						<p><a href="/product">Đọc thêm</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="images/home_shirt1.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Áo thun</h3>
						<p>Được làm từ những loại vải cao cấp và thoáng khí tạo cảm giác thoải mái</p>
						<p><a href="/product">Đọc thêm</a></p>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
				<div class="product-item-sm d-flex">
					<div class="thumbnail">
						<img src="images/home_shirt2.png" alt="Image" class="img-fluid">
					</div>
					<div class="pt-3">
						<h3>Áo sơ mi</h3>
						<p>Luôn cập nhật xu hướng cho giới trẻ với phong cách hiện đại, trẻ trung, năng động </p>
						<p><a href="/product">Đọc thêm</a></p>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>


<div class="testimonial-section">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 mx-auto text-center">
				<h2 class="section-title">Đánh giá</h2>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-12">
				<div class="testimonial-slider-wrap text-center">

					<div id="testimonial-nav">
						<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
						<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
					</div>

					<div class="testimonial-slider">

						<div class="item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">

									<div class="testimonial-block text-center">
										<blockquote class="mb-5">
											<p>&ldquo;Tôi đã mua một chiếc quần từ thương hiệu Tu's Clothes và hoàn toàn
												hài lòng với chất lượng. Vải rất mềm mại và thoáng mát, phù hợp với thời
												tiết nóng ẩm. Màu sắc và thiết kế cũng rất đẹp, y như hình ảnh trên
												trang web. Điều mình ấn tượng nhất là dịch vụ khách hàng rất tận tình,
												giao hàng nhanh chóng và đóng gói cẩn thận. Sẽ tiếp tục ủng hộ thương
												hiệu này!&rdquo;</p>
										</blockquote>

										<div class="author-info">
											<div class="author-pic">
												<img src="images/person-1.png" alt="Linh Trần" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">Linh Trần</h3>
											<span class="position d-block mb-3">CEO, Co-Founder, Thịnh Phát
												Company</span>
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">

									<div class="testimonial-block text-center">
										<blockquote class="mb-5">
											<p>&ldquo;Đây là lần đầu tiên tôi mua quần áo từ một local brand và tôi khá
												bất ngờ về chất lượng của sản phẩm. Áo sơ mi mình mua có đường may chắc
												chắn và chi tiết rất tỉ mỉ. Mặc dù giá cả hơi cao so với một số thương
												hiệu khác, nhưng mình cảm thấy rất đáng đồng tiền bát gạo. Mình cũng
												thích việc thương hiệu này sử dụng các vật liệu thân thiện với môi
												trường. Sẽ quay lại mua thêm sản phẩm khác!&rdquo;</p>
										</blockquote>

										<div class="author-info">
											<div class="author-pic">
												<img src="images/person-1.png" alt="Huy Nguyễn" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">Huy Nguyễn</h3>
											<span class="position d-block mb-3">Sinh viên, Cao đẳng FPT
												Polytechnic</span>
										</div>
									</div>

								</div>
							</div>
						</div>

						<div class="item">
							<div class="row justify-content-center">
								<div class="col-lg-8 mx-auto">

									<div class="testimonial-block text-center">
										<blockquote class="mb-5">
											<p>&ldquo;Mình đã mua một bộ đồ thể thao từ thương hiệu này và thật sự rất
												thích. Thiết kế rất thời trang và hiện đại, vừa vặn với dáng người châu
												Á. Chất liệu vải co giãn tốt, rất thoải mái khi vận động. Một điểm cộng
												lớn là chế độ đổi trả hàng rất linh hoạt, mình đã đổi size một lần và
												quá trình rất nhanh chóng, không gặp bất kỳ rắc rối nào. Highly
												recommend cho những ai đang tìm kiếm đồ local chất lượng!&rdquo;</p>
										</blockquote>

										<div class="author-info">
											<div class="author-pic">
												<img src="images/person-1.png" alt="Mai Phạm" class="img-fluid">
											</div>
											<h3 class="font-weight-bold">Mai Phạm</h3>
											<span class="position d-block mb-3">Người sưu tầm, Co-Founder, BJ
												Company</span>
										</div>
									</div>

								</div>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>


@endsection