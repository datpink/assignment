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

    @include('layout.header')

    @include('layout.nav')

    <div class="container2">
        <main class="main-content">

            @php
                $user = DB::table('users')
                    ->select('name')
                    ->where('id', '=', $article->user_id)
                    ->first();
            @endphp
            <h2>{{ $article->title }}</h2>
            <div class="time-main">
                <p>{{ $user->name }}</p><em>{{ $article->created_at }}</em>
            </div>
            <h4>{{ $article->content }}</h4>
            @foreach ($article->parts as $part)
                <div>
                    @if ($part->type == 'text')
                        <p class="ct-ct">{{ $part->content }}</p>
                    @elseif($part->type == 'image')
                        <div class="img-ct">
                            <img src="{{ $part->image_path }}">
                        </div>
                    @endif
                </div>
            @endforeach
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
                @foreach ($hot as $ht)
                    @php
                        $image = $ht->getFirstImage();
                    @endphp
                    <a href="{{ route('chitiet', ['id' => $ht->id]) }}" class="link">
                        <div class="cte row">
                            <div class=" col-lg-4 img-cte">
                                @if ($image)
                                    <img src="{{ $image->image_path }}" alt="Featured Image">
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
