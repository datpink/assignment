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
            <form class="form-inline" action="{{ route('search') }}" method="GET">
                <input class="form-control form-control-sm mr-1" type="search" placeholder="Tìm kiếm"
                    aria-label="Search" name="q" value="{{ request('q') }}">
                <button class="btn btn-outline-success btn-sm" type="submit">Tìm kiếm</button>
            </form>
        </div>
        @foreach ($articles as $article)
            <a href="{{ route('chitiet', ['id' => $article->id]) }}" class="link">
                <div class="kun row">
                    <div class=" col-lg-3 img-tk">
                        @php
                            $partWithImage = $article->parts->where('type', 'image')->first();
                        @endphp

                        @if ($partWithImage && $partWithImage->image_path && \Storage::exists($partWithImage->image_path))
                            @php
                                $image = $partWithImage->image_path;
                            @endphp
                            <img src="{{ \Storage::url($image) }}" alt="{{ $article->title }}" width="100">
                        @else
                            {{-- @php
                                            $image2 = $article->parts->where('type', 'image')->first()->image_path;
                                        @endphp
                                        <img src="{{ $image }}" alt="" width="100"> --}}
                            Không có ảnh (ảnh này cope link hehe)
                        @endif
                    </div>
                    <div class="col-lg-9 text-tk">
                        <h4>{{ $article->title }}</h4>
                        <p style="color: black; ">{{ $article->content }}</p>
                    </div>
                </div>
            </a>
        @endforeach

        <div class="pagination">
            {{ $articles->appends(['q' => request('q')])->links() }}
        </div>
    </div>

    {{-- Footer --}}

    @include('layout.footer')

</body>

</html>
