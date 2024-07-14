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

    <header class="header">
        <div class="container-fluid h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-4 text-center">
                    <div class="social-icons justify-content-center">
                        <a href="#"><img class="ic" src="/client/image/face.jpg" alt="Facebook"></a>
                        <a href="#"><img class="ic" src="/client/image/face.jpg" alt="Instagram"></a>
                        <a href="#"><img class="ic" src="/client/image/face.jpg" alt="YouTube"></a>
                        <a href="#"><img class="ic" src="/client/image/face.jpg" alt="Google"></a>
                    </div>
                </div>
                <div class="col-lg-4 text-center logo">
                    <img src="/client/image/logo.webp" alt="Logo">
                </div>
                <div class="col-lg-4 text-center">
                    <img src="https://th.bing.com/th/id/OIP.2hAVCZRMcBjsE8AGQfWCVQHaHa?rs=1&pid=ImgDetMain" alt="" style="height: 25px"><span class="ml-1 text-white">Login</span>
                </div>
            </div>
        </div>
    </header>


    {{-- Nav --}}


    <nav>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <img src="" alt="Logo">
                </div>
                <div class="col-lg-6">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bóng đá</a>
                            <ul class="submenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">EURO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Copa America</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cầu lông</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bơi lội</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 d-flex justify-content-end align-items-center">
                    <!-- Nội dung cột cuối cùng -->
                    <form class="form-inline">
                        <input class="form-control form-control-sm mr-1" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <button class="btn btn-outline-success btn-sm" type="submit">Tìm kiếm</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

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
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Recent Posts</h3>
                    <ul>
                        <li><a href="#">Post 1</a></li>
                        <li><a href="#">Post 2</a></li>
                        <li><a href="#">Post 3</a></li>
                        <!-- Add more recent posts here -->
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="#">Category 1</a></li>
                        <li><a href="#">Category 2</a></li>
                        <li><a href="#">Category 3</a></li>
                        <!-- Add more categories here -->
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Tags</h3>
                    <ul class="tag-cloud">
                        <li><a href="#">Tag 1</a></li>
                        <li><a href="#">Tag 2</a></li>
                        <li><a href="#">Tag 3</a></li>
                        <!-- Add more tags here -->
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
