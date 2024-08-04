<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa danh mục</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/client/css/admin.css">
</head>
<body>
    @include('layout.sidebar-admin')
    <div class="main-admin">
        <div class="container mt-4">
            <h1>Sửa danh mục</h1>

            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $category->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="hidden">Ẩn/Hiện:</label>
                    <select class="form-control @error('hidden') is-invalid @enderror" name="hidden" id="hidden">
                        <option value="0" {{ old('hidden', $category->hidden) == 0 ? 'selected' : '' }}>Ẩn</option>
                        <option value="1" {{ old('hidden', $category->hidden) == 1 ? 'selected' : '' }}>Hiện</option>
                    </select>
                    @error('hidden')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="order">Thứ tự:</label>
                    <input type="number" class="form-control @error('order') is-invalid @enderror" name="order" id="order" value="{{ old('order', $category->order) }}">
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
</body>
</html>
