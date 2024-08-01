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
    <div class="bna">
        <img src="/client/image/bnf.jpg" alt="">
    </div>


    {{-- ARticle --}}
    <div class="featured-news-header">
        <h3 class="featured-news-title">Tin nổi bật</h3>
    </div>
    <div class="featured-news-container">
        @foreach ($tinnb as $ht)
            @php
                $image = $ht->getFirstImage();
            @endphp
            <div class="featured-news bong">
                <a href="{{ route('chitiet', ['id' => $ht->id]) }}">
                    @if ($image)
                        <img src="{{ $image->image_path }}" alt="Featured Image">
                    @endif
                    <div class="featured-news-title"><p>{{ $ht->title }}</p></div>
                </a>
                <p class="time">{{ $ht->created_at }}</p>
            </div>
        @endforeach
    </div>
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



    {{-- Footer --}}
    @include('layout.footer')

</body>

</html>
