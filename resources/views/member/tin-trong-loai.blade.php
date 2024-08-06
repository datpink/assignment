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
                    <h4>{{ $loaiTin->name }}</h4>
                </div>
                @if ($listTin->isNotEmpty())
                    @foreach ($listTin as $lt)
                        <a href="{{ route('chitiet', ['id' => $lt->id]) }}" class="link">
                            <div class="kun2 row">
                                <div class=" col-lg-3 img-ttl">
                                    @php
                                        $partWithImage = $lt->parts->where('type', 'image')->first();
                                    @endphp

                                    @if ($partWithImage && $partWithImage->image_path && \Storage::exists($partWithImage->image_path))
                                        @php
                                            $image = $partWithImage->image_path;
                                        @endphp
                                        <img src="{{ \Storage::url($image) }}" alt="{{ $lt->title }}" width="100">
                                    @else
                                        {{-- @php
                                        $image2 = $article->parts->where('type', 'image')->first()->image_path;
                                    @endphp
                                    <img src="{{ $image }}" alt="" width="100"> --}}
                                        Không có ảnh (ảnh này cope link hehe)
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
                @foreach ($hot as $key => $ht)
                    <a href="{{ route('chitiet', ['id' => $ht->id]) }}" class="link">
                        <div class="cte row bong">
                            <div class="col-lg-4 img-cte">
                                @php
                                    // Tìm phần có kiểu là 'image' cho từng phần tử
                                    $partWithImage = $ht->parts->where('type', 'image')->first();
                                @endphp

                                @if ($partWithImage && $partWithImage->image_path && \Storage::exists($partWithImage->image_path))
                                    {{-- Hiển thị ảnh nếu tồn tại --}}
                                    <img src="{{ \Storage::url($partWithImage->image_path) }}" alt="{{ $ht->title }}"
                                        width="100">
                                @else
                                    {{-- Hiển thị thông báo không có ảnh --}}
                                    <div>Không có ảnh</div>
                                @endif
                            </div>
                            <div class="col-lg-8 text-cte">
                                <p>{{ $ht->title }}</p>
                                <div class="time">{{ $ht->created_at }}</div>
                            </div>
                        </div>
                    </a>
                @endforeach



            </div>
            <div class="sbsl">
                <div class="bg-tab img-full" style="background-image: url('/client/image/bg-tab.webp')">
                    <h4> TIN MỚI NHẤT</h4>
                </div>
                <div class="cte2 bg-primary" style="background-image: url('/client/image/i1.jpg') ">
                    @foreach ($tinmoi as $tm)
                        <a href="{{ route('chitiet', ['id' => $ht->id]) }}" class="link2">
                            <p class="sb-bgbl">{{ $tm->title }}</p>
                        </a>
                        <hr>
                    @endforeach
                </div>


            </div>
        </aside>
    </div>

    {{-- Footer --}}

    @include('layout.footer')

</body>

</html>
