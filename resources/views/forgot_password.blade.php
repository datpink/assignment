<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quên mật khẩu</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/client/css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body>
    @include('layout.header')
    @include('layout.nav')

    <div class="container mt-5 mb-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
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

        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title">Quên mật khẩu</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Gửi liên kết đặt lại mật khẩu</button>
                </form>
            </div>
        </div>
    </div>

    @include('layout.footer')
</body>
</html>
