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
            <h4>Từ khóa tìm kiếm:</h4>
            <form action="">
                <input type="text" class="form-control" value="{{ $keyword }}">
            </form>
        </div>
        @foreach ($articles as $article)
            <a href="{{ route('chitiet', ['id' => $article->id]) }}" class="link">
                <div class="kun row">
                    @php
                        $image = $article->getFirstImage();
                    @endphp
                    <div class=" col-lg-3 img-tk">
                        @if ($image)
                            <img src="{{ $image->image_path }}" alt="Featured Image">
                        @endif
                    </div>
                    <div class="col-lg-9 text-tk">
                        <h4>{{ $article->title }}</h4>
                        <p>{{ $article->content }}</p>
                    </div>
                </div>
            </a>
        @endforeach


    </div>

    {{-- Footer --}}

    @include('layout.footer')

</body>

</html>
