<div class="sidebar">
    <div class="logo-admin">
        <img src="/client/image/logo.webp" alt="hh">
    </div>
    <hr>
    <ul>
        <li><a href="{{ route('admin-home') }}">Trang chủ</a></li>
        <li>
            <a href="">Danh mục</a>
            <ul class="submenu">
                <li><a href="{{ route('categories.create') }}">Thêm mới danh mục</a></li>
                <li><a href="{{ route('categories.index') }}">Tất cả danh mục</a></li>
            </ul>
        </li>
        <li>
            <a>Tin tức</a>
            <ul class="submenu">
                <li><a href="{{ route('articles.create') }}">Thêm mới tin tức</a></li>
                <li><a href="{{ route('articles.index') }}">Tất cả tin tức</a></li>
            </ul>
        </li>

        <li>
            <a href="">Tài khoản</a>
            <ul class="submenu">
                <li><a href="{{ route('accounts.create') }}">Thêm mới tài khoản</a></li>
                <li><a href="{{ route('accounts.index') }}">Tất cả tài khoản</a></li>
            </ul>
        </li>
        <hr>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); confirmLogout();">Đăng xuất =></a></li>
        <script>
            function confirmLogout() {
                if (confirm('Bạn có chắc muốn đăng xuất khỏi tài khoản không?')) {
                    window.location.href = "{{ route('logout') }}";
                }
            }
        </script>
    </ul>
</div>


