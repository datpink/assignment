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
</head>

<body>

    {{-- Header --}}

    @include('layout.header')


    {{-- Nav --}}
    @include('layout.nav')

    {{-- Banner --}}

    <div class="row banner">
        <div class="col-lg-6">
            <img src="/client/image/bn2.webp" alt="">
        </div>
        <div class="col-lg-3">
            <img src="/client/image/bn3.jpg" alt="">
        </div>
        <div class="col-lg-3">
            <img src="/client/image/bn4.jpg" alt="">
        </div>
    </div>

    {{-- ARticle --}}
    <div class="featured-news-header">
        <h3 class="featured-news-title">Tin nổi bật</h3>
    </div>
    <div class="featured-news-container">
        <div class="featured-news">
            <a href="chitiet/1'">
                <img src="/client/image/im1.webp" alt="News Image 1">
                <div class="featured-news-title">Champions League 2024: Real Madrid vô địch thế nào?</div>
            </a>
            <p class="time">6:50 12/11/2024</p>
        </div>
        <div class="featured-news">
            <img src="/client/image/im1.webp" alt="News Image 1">
            <div class="featured-news-title">Champions League 2024: Real Madrid vô địch thế nào?</div>
            <p class="time">6:50 12/11/2024</p>
        </div>
        <div class="featured-news">
            <img src="/client/image/im1.webp" alt="News Image 1">
            <div class="featured-news-title">Champions League 2024: Real Madrid vô địch thế nào?</div>
            <p class="time">6:50 12/11/2024</p>
        </div>
        <div class="featured-news">
            <img src="/client/image/im1.webp" alt="News Image 1">
            <div class="featured-news-title">Champions League 2024: Real Madrid vô địch thế nào?</div>
            <p class="time">6:50 12/11/2024</p>
        </div>
        <div class="featured-news">
            <img src="/client/image/im1.webp" alt="News Image 1">
            <div class="featured-news-title">Champions League 2024: Real Madrid vô địch thế nào?</div>
            <p class="time">6:50 12/11/2024</p>
        </div>
        <div class="featured-news">
            <img src="/client/image/im1.webp" alt="News Image 1">
            <div class="featured-news-title">Champions League 2024: Real Madrid vô địch thế nào?</div>
            <p class="time">6:50 12/11/2024</p>
        </div>
    </div>

    <div class="bna">
        <img src="/client/image/bnf.jpg" alt="">
    </div>


    {{-- Footer --}}
    @include('layout.footer')

</body>

</html>
