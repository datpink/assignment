<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/client/css/admin.css">
</head>
<body>
    @include('layout.sidebar-admin')
    <div class="main-admin">
        <div class="container mt-4">
            <h1>Xin chào, {{ Auth::user()->name }}!</h1>
            <p class="lead">Đây là trang quản lý của admin. Sử dụng điều hướng bên trái để quản lý nội dung website.</p>
            <hr>

            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Bài viết</h5>
                            <p class="card-text">Quản lý và chỉnh sửa bài viết.</p>
                            <a href="" class="btn btn-light">Đi đến Bài viết</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Danh mục</h5>
                            <p class="card-text">Quản lý và chỉnh sửa danh mục.</p>
                            <a href="" class="btn btn-light">Đi đến Danh mục</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Người dùng</h5>
                            <p class="card-text">Quản lý và chỉnh sửa người dùng.</p>
                            <a href="" class="btn btn-light">Đi đến Người dùng</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Cài đặt</h5>
                            <p class="card-text">Thay đổi cài đặt website.</p>
                            <a href="" class="btn btn-light">Đi đến Cài đặt</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Nhật ký</h5>
                            <p class="card-text">Xem nhật ký hệ thống.</p>
                            <a href="" class="btn btn-light">Đi đến Nhật ký</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-secondary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Hồ sơ</h5>
                            <p class="card-text">Quản lý hồ sơ của bạn.</p>
                            <a href="" class="btn btn-light">Đi đến Hồ sơ</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
