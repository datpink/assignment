<div class="sidebar">
    <div class="logo-admin">
        <img src="/client/image/logo.webp" alt="hh">
    </div>
    <hr>
    <ul>
        <li><a href="{{ route('admin-home') }}">Home</a></li>
        <li>
            <a href="">Categories</a>
            <ul class="submenu">
                <li><a href="">Add New Category</a></li>
                <li><a href="">View All Categories</a></li>
            </ul>
        </li>
        <li>
            <a>Products</a>
            <ul class="submenu">
                <li><a href="{{ route('articles.create') }}">Add New Product</a></li>
                <li><a href="{{ route('articles.index') }}">View All Products</a></li>
            </ul>
        </li>

        <li><a href="">Orders</a></li>
        <li><a href="">Users</a></li>
        <hr>
        <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); confirmLogout();">Logout =></a></li>
        <script>
            function confirmLogout() {
                if (confirm('Bạn có chắc muốn đăng xuất khỏi tài khoản không?')) {
                    window.location.href = "{{ route('logout') }}";
                }
            }
        </script>
    </ul>
</div>


