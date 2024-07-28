<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lỗi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@if(session()->has('thongbao'))
    <div class="alert alert-info mt-5 p-5 col-8 h5 mx-auto text-center shadow-lg">
        {!! session('thongbao') !!}
    </div>
@endif
<div class="container">
    <div class="text-center">
        <a href="/" class="btn btn-danger mt-5">Quay lại an toàn</a>
    </div>
</div>
</body>
</html>

