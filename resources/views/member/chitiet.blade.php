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
            <p class="content-p">{{ $article->content }}</h4>
                @foreach ($article->parts as $part)
                    <div>
                        @if ($part->type == 'text')
                            <p class="ct-ct">{{ $part->content }}</p>
                        @elseif($part->type == 'image')
                            <div class="img-ct">
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
                        @endif
                    </div>
                @endforeach
            <div class="tcl">
                <div class="tcl-bg" style="background-image: url('/client/image/bg-tab.webp')">
                    <h5>Tin cùng danh mục</h5>
                </div>
                <div class="tcl-tin">
                    @foreach ($cungloai as $ht)
                        <div class="tcl-new bong">
                            <a href="{{ route('chitiet', ['id' => $ht->id]) }}">
                                @php
                                    $partWithImage = $ht->parts->where('type', 'image')->first();
                                @endphp

                                @if ($partWithImage && $partWithImage->image_path && \Storage::exists($partWithImage->image_path))
                                    @php
                                        $image = $partWithImage->image_path;
                                    @endphp
                                    <img src="{{ \Storage::url($image) }}" alt="{{ $ht->title }}" width="100">
                                @else
                                    {{-- @php
                                            $image2 = $article->parts->where('type', 'image')->first()->image_path;
                                        @endphp
                                        <img src="{{ $image }}" alt="" width="100"> --}}
                                    Không có ảnh (ảnh này cope link hehe)
                                @endif
                                <p>{{ $ht->title }}</p>
                            </a>
                        </div>
                    @endforeach
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
                @foreach ($hot as $ht)
                    <a href="{{ route('chitiet', ['id' => $ht->id]) }}" class="link">
                        <div class="cte row bong">
                            <div class="col-lg-4 img-cte">
                                @php
                                    $partWithImage = $ht->parts->where('type', 'image')->first();
                                @endphp

                                @if ($partWithImage && $partWithImage->image_path && \Storage::exists($partWithImage->image_path))
                                    @php
                                        $image = $partWithImage->image_path;
                                    @endphp
                                    <img src="{{ \Storage::url($image) }}" alt="{{ $ht->title }}" width="100">
                                @else
                                    {{-- @php
                                            $image2 = $article->parts->where('type', 'image')->first()->image_path;
                                        @endphp
                                        <img src="{{ $image }}" alt="" width="100"> --}}
                                    Không có ảnh (ảnh này cope link hehe)
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
