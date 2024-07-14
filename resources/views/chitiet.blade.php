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
        .container2 {
            width: 70%;
            margin: 0 auto;
            display: flex;
            height: calc(100vh - 60px);
            /* Trừ chiều cao của header */
            overflow-y: hidden;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #f0f0f0;
            overflow-y: scroll;
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE 10+ */
        }

        .main-content::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
        }

        .sidebar {
            width: 30%;
            padding: 20px;
            background-color: #e0e0e0;
            overflow-y: scroll;
            height: 100%;
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* IE 10+ */
        }

        .sidebar::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
        }

        .time {
            text-align: left;
        }

        /* Ẩn thanh cuộn mặc định */
        .container::-webkit-scrollbar {
            display: none;
        }

        .main-content::-webkit-scrollbar,
        .sidebar::-webkit-scrollbar {
            width: 10px;
        }

        .main-content::-webkit-scrollbar-thumb,
        .sidebar::-webkit-scrollbar-thumb {
            background: #888;
        }

        .main-content::-webkit-scrollbar-thumb:hover,
        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body>

    {{-- Header --}}

    @include('layout.header')


    {{-- Nav --}}


    @include('layout.nav')

    {{-- Main --}}
    <div class="container2">
        <main class="main-content">

        </main>

        <aside class="sidebar">
            <h3>Sidebar</h3>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
            <p>Thông tin phụ...</p>
        </aside>
    </div>

    {{-- Footer --}}
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3>Recent Posts</h3>
                    <ul>
                        <li><a href="#">Post 1</a></li>
                        <li><a href="#">Post 2</a></li>
                        <li><a href="#">Post 3</a></li>
                        <!-- Add more recent posts here -->
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Categories</h3>
                    <ul>
                        <li><a href="#">Category 1</a></li>
                        <li><a href="#">Category 2</a></li>
                        <li><a href="#">Category 3</a></li>
                        <!-- Add more categories here -->
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Tags</h3>
                    <ul class="tag-cloud">
                        <li><a href="#">Tag 1</a></li>
                        <li><a href="#">Tag 2</a></li>
                        <li><a href="#">Tag 3</a></li>
                        <!-- Add more tags here -->
                    </ul>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mainContent = document.getElementById('mainContent');
        const sidebar = document.getElementById('sidebar');
        const footer = document.getElementById('footer');

        function checkScroll() {
            // Lấy chiều cao của main-content và sidebar
            const mainHeight = mainContent.scrollHeight;
            const sidebarHeight = sidebar.scrollHeight;

            // Lấy chiều cao của cửa sổ viewport
            const viewportHeight = window.innerHeight;

            // Lấy vị trí scroll hiện tại của main-content và sidebar
            const mainScroll = mainContent.scrollTop;
            const sidebarScroll = sidebar.scrollTop;

            // Tính tổng chiều cao cần scroll
            const totalScroll = mainHeight + sidebarHeight - viewportHeight;

            // Nếu đã scroll đến cuối cùng thì hiển thị footer
            if (mainScroll + sidebarScroll >= totalScroll) {
                footer.style.display = 'block';
            } else {
                footer.style.display = 'none';
            }
        }

        // Thêm sự kiện scroll cho main-content và sidebar
        mainContent.addEventListener('scroll', checkScroll);
        sidebar.addEventListener('scroll', checkScroll);
    });
</script>
