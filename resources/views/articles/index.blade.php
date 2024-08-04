<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Bài viết</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/client/css/admin.css">
</head>

<body>
    @include('layout.sidebar-admin')
    <div class="main-admin">
        <div class="container mt-4">
            <h1>Danh sách Bài viết</h1>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('errors'))
                <div class="alert alert-errors">{{ session('errors') }}</div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Danh mục</th>
                        <th>Ảnh</th>
                        <th>Ngày tạo</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td class="title-column">{{ $article->title }}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>
                                @php
                                    $partWithImage = $article->parts->where('type', 'image')->first();
                                @endphp

                                @if ($partWithImage && $partWithImage->image_path && \Storage::exists($partWithImage->image_path))
                                    @php
                                        $image = $partWithImage->image_path;
                                    @endphp
                                    <img src="{{ \Storage::url($image) }}" alt="{{ $article->title }}" width="100">
                                @else
                                    {{-- @php
                                        $image2 = $article->parts->where('type', 'image')->first()->image_path;
                                    @endphp
                                    <img src="{{ $image }}" alt="" width="100"> --}}
                                    Không có ảnh (ảnh này cope link hehe)
                                @endif

                            </td>
                            <td>{{ $article->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">
                                    Sửa</a>
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info">
                                    Chi tiết
                                </a>
                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                    class="d-inline-block"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
