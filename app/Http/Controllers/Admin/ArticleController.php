<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use App\Models\ArticlePart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('category')->orderBy('id', 'desc')->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        DB::beginTransaction();

        try {
            // Lưu bài viết
            $user_id = Auth::user()->id;
            $article = Article::create([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => $user_id,
                'published_at' => now(),
                'featured' => $request->has('featured') ? $request->featured : 0,
                'view_count' => 0,
                'category_id' => $request->category_id,
            ]);

            // Lưu các phần của bài viết
            foreach ($request->article_parts as $part) {
                $data = [
                    'article_id' => $article->id,
                    'type' => $part['type'],
                    'content' => $part['content'] ?? null,
                    'order' => $part['order'],
                ];

                if ($part['type'] === 'image' && isset($part['image_path'])) {
                    // Xử lý file tải lên
                    $path = Storage::put('images', $part['image_path']);
                    $data['image_path'] = $path;
                }

                ArticlePart::create($data);
            }

            DB::commit();

            return redirect()->route('articles.index')->with('success', 'Article created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating article: ' . $e->getMessage());
            return back()->withErrors('Error creating article: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $article->load('parts'); // Eager load parts
        return view('articles.detail', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $categories = Category::all();
        return view('articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'article_parts.*.type' => 'required|in:text,image',
            'article_parts.*.content' => 'nullable|string',
            'article_parts.*.order' => 'required|integer',
            'article_parts.*.image_path' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $article = Article::findOrFail($id);

        // Cập nhật thông tin bài viết
        $article->update([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content'),
        ]);

        // Xóa các phần bài viết cũ không còn tồn tại trong request
        $existingPartIds = $request->input('article_parts.*.id', []);
        ArticlePart::where('article_id', $article->id)
            ->whereNotIn('id', $existingPartIds)
            ->delete();

        // Xử lý các phần bài viết từ request
        $parts = $request->input('article_parts', []);

        foreach ($parts as $index => $part) {
            // Tìm phần bài viết dựa trên ID và article_id
            $articlePart = ArticlePart::where('article_id', $article->id)
                ->where('id', $part['id'] ?? null)
                ->first();

            // Xử lý ảnh
            if ($part['type'] === 'image') {
                $imagePath = $request->hasFile('article_parts.' . $index . '.image_path')
                    ? $request->file('article_parts.' . $index . '.image_path')->store('images', 'public')
                    : ($articlePart ? $articlePart->image_path : null); // Giữ ảnh cũ nếu không có ảnh mới
            } else {
                $imagePath = null; // Không có ảnh cho loại text
            }

            if ($articlePart) {
                // Cập nhật phần bài viết
                $articlePart->update([
                    'type' => $part['type'],
                    'content' => $part['content'] ?? null,
                    'order' => $part['order'],
                    'image_path' => $imagePath,
                ]);
            } else {
                // Tạo mới phần bài viết
                ArticlePart::create([
                    'article_id' => $article->id,
                    'type' => $part['type'],
                    'content' => $part['content'] ?? null,
                    'order' => $part['order'],
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('articles.index')->with('success', 'Article updated successfully!');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->parts()->delete();
            $article->delete();
            return redirect()->route('articles.index')->with('success', 'Bài viết đã được xóa thành công.');
        }
        return redirect()->route('articles.index')->with('error', 'Bài viết không tồn tại.');
    }
}
