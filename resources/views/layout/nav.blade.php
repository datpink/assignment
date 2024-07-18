<?php
    $loaitin_arr = DB::table('categories')->select('id','name')
    ->orderby('thuTu','asc')
    ->where('AnHien',1)
    ->limit(5)->get();
?>
<nav class="">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <img src="" alt="Logo">
            </div>
            <div class="col-lg-6">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Trang chủ</a>
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
                    @foreach ($loaitin_arr as $lt)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('cat', [$lt->id]) }}">{{ $lt->ten }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-lg-3 d-flex justify-content-end align-items-center">
                <!-- Nội dung cột cuối cùng -->
                <form class="form-inline">
                    <input class="form-control form-control-sm mr-1" type="search" placeholder="Tìm kiếm"
                        aria-label="Search">
                    <button class="btn btn-outline-success btn-sm" type="submit">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </div>
</nav>
