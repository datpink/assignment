<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Bài viết</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/client/css/admin.css">
</head>
<body>
    @include('layout.sidebar-admin')
    <div class="main-admin">
        <h1>Tạo Bài viết</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('errors'))
            <div class="alert alert-errors">{{ session('errors') }}</div>
        @endif

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Nội dung:</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Danh mục:</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                    <option value="" disabled selected>Chọn danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div id="article_parts">
                <h3>Các phần của bài viết</h3>
                <div class="article_part border p-3 mb-3">
                    <div class="form-group">
                        <label for="type">Loại:</label>
                        <select name="article_parts[0][type]" class="form-control type_select @error('article_parts.0.type') is-invalid @enderror">
                            <option value="text">Văn bản</option>
                            <option value="image">Hình ảnh</option>
                        </select>
                        @error('article_parts.0.type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group content_field">
                        <label for="content">Nội dung:</label>
                        <textarea class="form-control" name="article_parts[0][content]">{{ old('article_parts.0.content') }}</textarea>
                        @error('article_parts.0.content')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group image_field" style="display:none;">
                        <label for="image_path">Đường dẫn hình ảnh:</label>
                        <input type="file" class="form-control-file @error('article_parts.0.image_path') is-invalid @enderror" name="article_parts[0][image_path]">
                        @error('article_parts.0.image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="order">Thứ tự:</label>
                        <input type="number" class="form-control @error('article_parts.0.order') is-invalid @enderror" name="article_parts[0][order]" value="{{ old('article_parts.0.order') }}">
                        @error('article_parts.0.order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="button" class="btn btn-danger remove_part">Xóa</button>
                </div>
            </div>

            <button type="button" id="add_part" class="btn btn-secondary mb-3">Thêm phần</button>

            <div>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </div>
        </form>
    </div>

    <script>
        let partIndex = 1;

        function updateFields(part) {
            const typeSelect = part.find('.type_select');
            const contentField = part.find('.content_field');
            const imageField = part.find('.image_field');

            typeSelect.change(function() {
                if ($(this).val() === 'text') {
                    contentField.show();
                    imageField.hide();
                } else if ($(this).val() === 'image') {
                    contentField.hide();
                    imageField.show();
                }
            });

            typeSelect.trigger('change');
        }

        $('#add_part').click(function() {
            const newPart = $(`
                <div class="article_part border p-3 mb-3">
                    <div class="form-group">
                        <label for="type">Loại:</label>
                        <select name="article_parts[${partIndex}][type]" class="form-control type_select">
                            <option value="text">Văn bản</option>
                            <option value="image">Hình ảnh</option>
                        </select>
                    </div>
                    <div class="form-group content_field">
                        <label for="content">Nội dung:</label>
                        <textarea class="form-control" name="article_parts[${partIndex}][content]">{{ old('article_parts.${partIndex}.content') }}</textarea>
                    </div>
                    <div class="form-group image_field" style="display:none;">
                        <label for="image_path">Đường dẫn hình ảnh:</label>
                        <input type="file" class="form-control-file" name="article_parts[${partIndex}][image_path]">
                    </div>
                    <div class="form-group">
                        <label for="order">Thứ tự:</label>
                        <input type="number" class="form-control" name="article_parts[${partIndex}][order]">
                    </div>
                    <button type="button" class="btn btn-danger remove_part">Xóa</button>
                </div>
            `);

            $('#article_parts').append(newPart);
            updateFields(newPart);
            partIndex++;
        });

        $(document).on('click', '.remove_part', function() {
            $(this).closest('.article_part').remove();
        });

        $(document).ready(function() {
            updateFields($('.article_part'));
        });
    </script>
</body>
</html>
