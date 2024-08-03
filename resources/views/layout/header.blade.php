<header class="header">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">
            <div class="col-lg-4 text-center">
                <div class="social-icons justify-content-center">
                    <a href="#"><img class="ic" src="/client/image/face.jpg" alt="Facebook"></a>
                    <a href="#"><img class="ic" src="/client/image/go.jpg" alt="Instagram"></a>
                    <a href="#"><img class="ic" src="/client/image/yo.jpg" alt="YouTube"></a>
                    <a href="#"><img class="ic" src="/client/image/yo.jpg" alt="Google"></a>
                </div>
            </div>
            <div class="col-lg-4 text-center logo">
                <a href="/">
                    <img src="/client/image/logo.webp" alt="Logo">
                </a>
            </div>
            <div class="col-lg-4 text-center">
                <a href="">
                    <img src="/client/image/OIP.jpg" alt="" style="height: 25px" class="ic">
                </a>

                @if (!Auth::check())
                    <span class="text-white">Khách |</span>
                    <a href="{{ route('login') }}">
                        <span class="ml-1 text-white">Đăng nhập</span>
                    </a>
                @else
                    <span class="text-white">{{ Auth::user()->name }} |</span>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); confirmLogout();">
                        <span class="ml-1 text-white">Đăng xuất</span>
                    </a>
                @endif

            </div>
        </div>
    </div>

    <script>
        function confirmLogout() {
            if (confirm('Bạn có chắc muốn đăng xuất khỏi tài khoản không?')) {
                window.location.href = "{{ route('logout') }}";
            }
        }
    </script>
</header>
