<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Trang tin tức')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/client/css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <style>


    </style>
</head>

<body>

    {{-- Header --}}

    @include('layout.header')


    {{-- Nav --}}


    @include('layout.nav')

    {{-- Main --}}

    <div class="tk">
        <div class="htbg" style="background-image: url('/client/image/bg-tab.webp')">
            <h4>Từ khóa tìm kiếm: ..</h4>
            <form action="">
                <input type="text" class="form-control">
            </form>
        </div>
        <div class="kun row">
            <div class=" col-lg-3 img-tk">
                <img src="/client/image/i1.jpg" alt="">
            </div>
            <div class="col-lg-9 text-tk">
                <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
            </div>
        </div>
        <div class="kun row">
            <div class=" col-lg-3 img-tk">
                <img src="/client/image/i1.jpg" alt="">
            </div>
            <div class="col-lg-9 text-tk">
                <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
            </div>
        </div>
        <div class="kun row">
            <div class=" col-lg-3 img-tk">
                <img src="/client/image/i1.jpg" alt="">
            </div>
            <div class="col-lg-9 text-tk">
                <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
            </div>
        </div>
        <div class="kun row">
            <div class=" col-lg-3 img-tk">
                <img src="/client/image/i1.jpg" alt="">
            </div>
            <div class="col-lg-9 text-tk">
                <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
            </div>
        </div>
        <div class="kun row">
            <div class=" col-lg-3 img-tk">
                <img src="/client/image/i1.jpg" alt="">
            </div>
            <div class="col-lg-9 text-tk">
                <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
            </div>
        </div>
        <div class="kun row">
            <div class=" col-lg-3 img-tk">
                <img src="/client/image/i1.jpg" alt="">
            </div>
            <div class="col-lg-9 text-tk">
                <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
            </div>
        </div>


    </div>

    {{-- Footer --}}

    @include('layout.footer')

</body>

</html>
