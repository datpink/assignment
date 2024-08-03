<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Bài viết</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/client/css/admin.css">
    <style>
        .article-part {
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .article-part img {
            max-width: 100%;
            height: auto;
        }

        .content {
            background-color: #f9f9f9;
            padding: 1rem;
            border-radius: 0.25rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-back {
            margin-top: 1rem;
        }
        .image_field img{
            max-width: 70%;
            padding: 15px;
        }
    </style>
</head>

<body>
    @include('layout.sidebar-admin')
    <div class="main-admin">
        <div class="container mt-4">
            <h1 class="mb-4">Chi tiết Bài viết</h1>

            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $article->title }}</h2>
                    <p><strong>Danh mục:</strong> {{ $article->category->name }}</p>
                    <p><strong>Ngày tạo:</strong> {{ $article->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>

            <div class="content mb-4">
                <h3>Nội dung</h3>
                <p>{{ $article->content }}</p>
            </div>

            <h3>Các phần bài viết</h3>
            @foreach($article->parts as $part)
                <div class="article-part">
                    @if($part->type == 'text')
                        <div class="content_field">
                            <p>{{ $part->content }}</p>
                        </div>
                    @elseif($part->type == 'image')
                        <div class="image_field">
                            @if($part->image_path)
                                <img src="{{ asset('storage/' . $part->image_path) }}" alt="{{ $part->content }}">
                            @else
                                <p>Không có ảnh</p>
                            @endif
                        </div>
                    @endif
                    <p><strong>Thứ tự:</strong> {{ $part->order }}</p>
                </div>
            @endforeach

            <a href="{{ route('articles.index') }}" class="btn btn-primary btn-back">Quay lại danh sách</a>
        </div>
    </div>
</body>

</html>
