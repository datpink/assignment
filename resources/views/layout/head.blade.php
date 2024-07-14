<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Trang tin tức')</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        header {
            background-color: #000000;
            height: 80px;
        }

        .social-icons {
            display: flex;
            align-items: center;
            height: 100%;
            padding-left: 150px; /* Để tạo khoảng cách từ lề trái */
        }

        .social-icons a {
            color: white;
            margin-right: 15px; /* Để tạo khoảng cách giữa các biểu tượng */
            font-size: 24px; /* Kích thước của biểu tượng */
        }
        .ic{
            width: 25px;
            height: 25px;
            border-radius:45px;
            border: 2px solid white
        }
        .w100{
            width: 100%
        }
        .h100{
            height: 100%;
        }
        .logo img{
            height: 60px;
            margin-top: 10px;
        }
    </style>
</head>
