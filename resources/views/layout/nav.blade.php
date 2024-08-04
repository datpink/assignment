<?php
    $cate= DB::table('categories')->select('id','name')
    ->orderby('order','asc')
    ->where('hidden',1)
    ->limit(5)->get();
?>
<nav class="">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <img src="" act="Logo">
            </div>
            <div class="col-lg-6">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
                    </li>
                    @foreach ($cate as $ct)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('cat', [$ct->id]) }}">{{ $ct->name }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-lg-3 d-flex justify-content-end align-items-center">
                <!-- Nội dung cột cuối cùng -->
                <form class="form-inline" action="{{ route('search') }}" method="get">

                    <input class="form-control form-control-sm mr-1" type="search" placeholder="Tìm kiếm"
                        aria-label="Search" name="q">
                    <button class="btn btn-outline-success btn-sm" type="submit">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </div>
</nav>
