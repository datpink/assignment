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
    <div class="container2">
        <main class="main-content">
            <div class="ttl">
                <div class="htbg" style="background-image: url('/client/image/bg-tab.webp')">
                    <h4>Tin trong loại</h4>
                </div>
                <div class="kun2 row">
                    <div class=" col-lg-3 img-ttl">
                        <img src="/client/image/i1.jpg" alt="">
                    </div>
                    <div class="col-lg-9 text-ttl">
                        <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                        <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
                    </div>
                </div>
                <div class="kun2 row">
                    <div class=" col-lg-3 img-ttl">
                        <img src="/client/image/i1.jpg" alt="">
                    </div>
                    <div class="col-lg-9 text-ttl">
                        <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                        <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
                    </div>
                </div>
                <div class="kun2 row">
                    <div class=" col-lg-3 img-ttl">
                        <img src="/client/image/i1.jpg" alt="">
                    </div>
                    <div class="col-lg-9 text-ttl">
                        <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                        <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
                    </div>
                </div>
                <div class="kun2 row">
                    <div class=" col-lg-3 img-ttl">
                        <img src="/client/image/i1.jpg" alt="">
                    </div>
                    <div class="col-lg-9 text-ttl">
                        <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                        <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
                    </div>
                </div>
                <div class="kun2 row">
                    <div class=" col-lg-3 img-ttl">
                        <img src="/client/image/i1.jpg" alt="">
                    </div>
                    <div class="col-lg-9 text-ttl">
                        <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                        <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
                    </div>
                </div>
                <div class="kun2 row">
                    <div class=" col-lg-3 img-ttl">
                        <img src="/client/image/i1.jpg" alt="">
                    </div>
                    <div class="col-lg-9 text-ttl">
                        <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                        <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
                    </div>
                </div>
                <div class="kun2 row">
                    <div class=" col-lg-3 img-ttl">
                        <img src="/client/image/i1.jpg" alt="">
                    </div>
                    <div class="col-lg-9 text-ttl">
                        <h4>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch trong những năm gần đây</h4>
                        <p>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó vươn tầm trong tương lai gần.</p>
                    </div>
                </div>

            </div>
        </main>

        <aside class="sidebar">
            <div class="img-full">
                <img src="/client/image/r.jpg">
            </div>
            <div class="sbsl ">
                <div class="bg-tab img-full" style="background-image: url('/client/image/bg-tab.webp')">
                    <h4> TIN NÓNG</h4>
                </div>
                <div class="cte row">
                    <div class="col-lg-4 img-cte">
                        <img src="/client/image/im1.webp" alt="News Image 1">
                    </div>
                    <div class="col-lg-8 text-cte">
                        <p>Champions League 2024: Real Madrid vô địch thế nào?</p>
                        <div class="time">26/7/2024</div>
                    </div>

                </div>
                <div class="cte row">
                    <div class="col-lg-4 img-cte">
                        <img src="/client/image/im1.webp" alt="News Image 1">
                    </div>
                    <div class="col-lg-8 text-cte">
                        <p>Champions League 2024: Real Madrid vô địch thế nào?</p>
                        <div class="time">26/7/2024</div>
                    </div>

                </div>
                <div class="cte row">
                    <div class="col-lg-4 img-cte">
                        <img src="/client/image/im1.webp" alt="News Image 1">
                    </div>
                    <div class="col-lg-8 text-cte">
                        <p>Champions League 2024: Real Madrid vô địch thế nào?</p>
                        <div class="time">26/7/2024</div>
                    </div>

                </div>
                <div class="cte row">
                    <div class="col-lg-4 img-cte">
                        <img src="/client/image/im1.webp" alt="News Image 1">
                    </div>
                    <div class="col-lg-8 text-cte">
                        <p>Champions League 2024: Real Madrid vô địch thế nào?</p>
                        <div class="time">26/7/2024</div>
                    </div>

                </div>
                <div class="cte row">
                    <div class="col-lg-4 img-cte">
                        <img src="/client/image/im1.webp" alt="News Image 1">
                    </div>
                    <div class="col-lg-8 text-cte">
                        <p>Champions League 2024: Real Madrid vô địch thế nào?</p>
                        <div class="time">26/7/2024</div>
                    </div>

                </div>

            </div>
            <div class="sbsl">
                <div class="bg-tab img-full" style="background-image: url('/client/image/bg-tab.webp')">
                    <h4> TIN MỚI NHẤT</h4>
                </div>
                <div class="cte2 bg-primary" style="background-image: url('/client/image/i1.jpg') " >
                    <p class="sb-bgbl">Hai nền tảng mà Flick muốn dựa vào để xây dựng Barca</p>
                    <hr>
                    <p class="sb-bgbl">Hai nền tảng mà Flick muốn dựa vào để xây dựng Barca</p>
                    <hr>
                    <p class="sb-bgbl">Hai nền tảng mà Flick muốn dựa vào để xây dựng Barca</p>
                    <hr>
                    <p class="sb-bgbl">Hai nền tảng mà Flick muốn dựa vào để xây dựng Barca</p>
                    <hr>
                    <p class="sb-bgbl">Hai nền tảng mà Flick muốn dựa vào để xây dựng Barca</p>
                </div>


            </div>
        </aside>
    </div>

    {{-- Footer --}}

    @include('layout.footer')

</body>

</html>
