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
        }
        .main-content {
            padding: 20px;
            background-color: #f0f0f0;
            width: 70%
        }
        .sidebar {
            width: 30%;
            padding: 20px;
            background-color: #e0e0e0;
            height: 100%;
        }
        .time {
            text-align: left;
        }
        .igmf{
            width: 100%;
            margin: 0 auto;

        }

        .img-full img{
            width: 100%;
            height: 100%;
        }

        .sbsl{
            width: 100%;
            margin-top: 30px;
            height: 800px;

        }
        .bg-tab{
            width: 100%;
            border-top-right-radius: 60px;
            border-top-left-radius: 60px;
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
            <h2>Bóng đá Việt Nam: Gian nan xuất ngoại, hờ hững nhập tịch</h2>
            <div class="time">11:15 Chủ Nhật, 23/06/2024</div>
            <h4>Một khi chưa có những chính sách tốt cho vấn đề xuất ngoại và nhập tịch cầu thủ, bóng đá Việt Nam sẽ khó
                vươn tầm trong tương lai gần.</h4>
            <img src="/client/image/i1.jpg" alt="">
            <p>Sáu tháng đầu năm 2024 đang chứng kiến sự tụt dốc khá rõ của bóng đá Việt Nam khi chúng ta mất đi vị thế
                đứng đầu khu vực và rơi rất sâu trên BXH FIFA, xuống hạng 116 thế giới. Sau 7 năm, Những chiến binh Sao
                Vàng mới ở tình cảnh thê thảm đến thế kể từ tháng 11/2017. Một trong các nguyên nhân lớn dẫn đến sự đi
                xuống của môn thể thao vua tại dải đất hình chữ S chính là việc chưa thể bắt kịp xu hướng chung của thế
                giới ở 2 vấn đề gồm xuất ngoại và nhập tịch cầu thủ.

                Gian nan xuất ngoại...

                Giai đoạn của năm 2022, bóng đá Việt Nam hứng khởi khi Nguyễn Quang Hải rồi sau đó là Nguyễn Văn Toàn
                cùng Nguyễn Công Phượng đồng loạt xuất ngoại. Trước đó, những cái tên khác như Lương Xuân Trường, Nguyễn
                Tuấn Anh hay Đoàn Văn Hậu cũng đã có những trải nghiệm tốt ở các CLB nước ngoài. Thế nhưng, những kỳ
                vọng về một làn sóng vươn ra biển lớn đã không đến khi các cầu thủ không tìm được chỗ đứng tại đội bóng
                mới. Họ gần như mất hút, dự bị hoặc thi đấu rất ít.

                bong-da-viet-nam-gian-nan-xuat-ngoai-ho-hung-nhap-tich
                Hoàng Đức và Tuấn Hải khó xuất ngoại.
                Để rồi, trong thời gian vừa qua, đã có những thông tin về việc 3 cầu thủ hàng đầu của bóng đá Việt Nam
                hiện tại gồm Nguyễn Quang Hải, Phạm Tuấn Hải hay Nguyễn Hoàng Đức sẽ ra nước ngoài thi đấu. Tuy vậy,
                viễn cảnh trên dường như sẽ không đến khi 3 ngôi sao của ĐT Việt Nam chọn giải pháp an toàn là gắn bó
                với các CLB tại V.League. Rõ ràng, thất bại của người đi trước đang khiến họ phải chùn bước. Nó cũng chỉ
                ra những hạn chế của cầu thủ Việt Nam trong việc tiếp cận với thế giới.


                Nói về việc xuất ngoại của cầu thủ Việt Nam, nhà môi giới người Slovenia - Jernej Kamensek cho biết trên
                Bongdaplus: "Có một thực tế cần phải bàn là cầu thủ Việt Nam đang nhận chế độ quá cao so với năng lực
                thực tế của họ. Các CLB nước ngoài sẽ không thể trả được con số như vậy. Một cầu thủ giỏi của Việt Nam
                nhận lương gấp 10 lần so với con số thực tế về lương mà các đội bóng ở nước ngoài có thể chi trả. Đó
                cũng là một phần lý do khiến cho cầu thủ Việt Nam ít xuất ngoại. Hay ngược lại, các CLB nước ngoài chưa
                quan tâm đúng mực đến thị trường Việt Nam”.

                ...hờ hững nhập tịch

                Gian nan với bài toán xuất ngoại, bóng đá Việt Nam ở thời điểm hiện tại cũng không quá quan tâm đến vấn
                đề nhập tịch cho những nhân tố Việt kiều hay các cầu thủ ngoại chất lượng có nguyện vọng cống hiến cho
                ĐTQG. Bằng chứng là ngoài Nguyễn Filip và Đặng Văn Lâm, chưa có nhiều những gương mặt nước ngoài được
                góp mặt trong thành phần của Những chiến binh Sao Vàng.

                Liên đoàn Bóng đá Việt Nam (VFF) từng cho biết họ sẵn sàng tạo điều kiện để các nhân tố Việt kiều được
                cống hiến cho dải đất hình chữ S. Nói là một chuyện nhưng trên thực tế, họ chưa hề có những giải pháp để
                thu hút tài năng giống như cách mà Thái Lan hay Indonesia đang làm trong suốt thời gian qua.</p>
        </main>

        <aside class="sidebar">
            <div class="img-full">
                <img src="/client/image/r.jpg">
            </div>
            <div class="sbsl bg-primary">
                <div class="bg-tab img-full">
                    <img src="/client/image/bg-tab.webp" alt="">
                </div>
            </div>
        </aside>
    </div>

    {{-- Footer --}}

    @include('layout.footer')

</body>

</html>


{{-- <script>
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
</script> --}}
