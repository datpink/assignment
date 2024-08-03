<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật bài viết</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="/client/css/admin.css">
</head>
<body>
    @include('layout.sidebar-admin')
    <div class="main-admin">
        <h1>Cập nhật bài viết</h1>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('errors'))
            <div class="alert alert-danger">{{ session('errors') }}</div>
        @endif

        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title', $article->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="category_id">Danh mục:</label>
                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">
                    <option value="" disabled>Chọn danh mục</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Nội dung:</label>
                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content">{{ old('content', $article->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div id="article_parts">
                <h3>Các phần bài viết</h3>
                @foreach($article->parts as $index => $part)
                    <div class="article_part border p-3 mb-3">
                        <div class="form-group">
                            <label for="type">Loại:</label>
                            <select name="article_parts[{{ $index }}][type]" class="form-control type_select">
                                <option value="text" {{ $part->type == 'text' ? 'selected' : '' }}>Text</option>
                                <option value="image" {{ $part->type == 'image' ? 'selected' : '' }}>Image</option>
                            </select>
                        </div>
                        <div class="form-group content_field" style="{{ $part->type == 'text' ? 'display:block;' : 'display:none;' }}">
                            <label for="content">Nội dung:</label>
                            <textarea class="form-control" name="article_parts[{{ $index }}][content]">{{ old('article_parts.' . $index . '.content', $part->content) }}</textarea>
                        </div>
                        <div class="form-group image_field" style="{{ $part->type == 'image' ? 'display:block;' : 'display:none;' }}">
                            <label for="image_path">Đường dẫn ảnh:</label>
                            @if($part->image_path)
                                <img src="{{ asset('storage/' . $part->image_path) }}" alt="{{ $part->content }}" width="100">
                            @endif
                            <input type="file" class="form-control-file" name="article_parts[{{ $index }}][image_path]">
                        </div>
                        <div class="form-group">
                            <label for="order">Thứ tự:</label>
                            <input type="number" class="form-control" name="article_parts[{{ $index }}][order]" value="{{ old('article_parts.' . $index . '.order', $part->order) }}">
                        </div>
                        <button type="button" class="btn btn-danger remove_part">Xóa</button>
                        <input type="hidden" name="article_parts[{{ $index }}][id]" value="{{ $part->id }}">
                    </div>
                @endforeach
            </div>

            <button type="button" id="add_part" class="btn btn-secondary mb-3">Thêm phần</button>

            <div>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>

    <script>
    let partIndex = {{ count($article->parts) }};

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
                        <option value="text">Text</option>
                        <option value="image">Image</option>
                    </select>
                </div>
                <div class="form-group content_field" style="display:none;">
                    <label for="content">Nội dung:</label>
                    <textarea class="form-control" name="article_parts[${partIndex}][content]"></textarea>
                </div>
                <div class="form-group image_field" style="display:none;">
                    <label for="image_path">Đường dẫn ảnh:</label>
                    <input type="file" class="form-control-file" name="article_parts[${partIndex}][image_path]">
                </div>
                <div class="form-group">
                    <label for="order">Thứ tự:</label>
                    <input type="number" class="form-control" name="article_parts[${partIndex}][order]">
                </div>
                <button type="button" class="btn btn-danger remove_part">Xóa</button>
                <input type="hidden" name="article_parts[${partIndex}][id]" value="">
            </div>
        `);

        $('#article_parts').append(newPart);
        updateFields(newPart);
        partIndex++;
    });

    $('#article_parts').on('click', '.remove_part', function() {
        $(this).closest('.article_part').remove();
    });

    // Cập nhật các phần đã có
    $('.article_part').each(function() {
        updateFields($(this));
    });
</script>

</body>
</html>
