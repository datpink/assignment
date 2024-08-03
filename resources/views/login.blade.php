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

    {{-- Main --}}
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card mt-5 mb-5">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Form Đăng ký</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('register') }}"><button class="btn btn-primary mb-5">Đăng ký</button></a>
                <form method="POST" action="{{ url('/login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </form>
                <div class="mt-3">
                    <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                </div>
            </div>
        </div>
    </div>

    @include('layout.footer')
</body>

</html>
