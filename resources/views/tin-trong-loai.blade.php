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
                @if ($listTin->isNotEmpty())
                    @foreach ($listTin as $lt)
                        @php
                            $image = $lt->getFirstImage();
                        @endphp
                        <a href="{{ route('chitiet', ['id' => $lt->id]) }}" class="link">
                            <div class="kun2 row">
                                <div class=" col-lg-3 img-ttl">
                                    @if ($image)
                                        <img src="{{ $image->image_path }}" alt="Featured Image">
                                    @endif
                                </div>
                                <div class="col-lg-9 text-ttl">
                                    <h4>{{ $lt->title }}</h4>
                                    <p>{{ $lt->content }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="nothing" style="width: 100% ;margin: 0 auto; color: red">
                        <p>Không có tin nào</p>
                    </div>
                @endif
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
                <div class="cte2 bg-primary" style="background-image: url('/client/image/i1.jpg') ">
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
