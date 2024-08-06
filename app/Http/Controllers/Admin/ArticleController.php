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
        $articles = Article::with('category','parts')->orderBy('id', 'desc')->get();
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
            foreach ($request->article_parts as $part) {
                $data = [
                    'article_id' => $article->id,
                    'type' => $part['type'],
                    'content' => $part['content'] ?? null,
                    'order' => $part['order'],
                ];

                if ($part['type'] === 'image' && isset($part['image_path'])) {
                    $path = Storage::put('images', $part['image_path']);
                    $data['image_path'] = $path;
                }

                ArticlePart::create($data);
            }

            DB::commit();

            return redirect()->route('articles.index')->with('success', 'Thêm mới tin hành công!');
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

        $article->update([
            'title' => $request->input('title'),
            'category_id' => $request->input('category_id'),
            'content' => $request->input('content'),
        ]);

        $existingPartIds = $request->input('article_parts.*.id', []);
        ArticlePart::where('article_id', $article->id)
            ->whereNotIn('id', $existingPartIds)
            ->delete();

        $parts = $request->input('article_parts', []);

        foreach ($parts as $index => $part) {
            $articlePart = ArticlePart::where('article_id', $article->id)
                ->where('id', $part['id'] ?? null)
                ->first();

            if ($part['type'] === 'image') {
                $imagePath = $request->hasFile('article_parts.' . $index . '.image_path')
                    ? $request->file('article_parts.' . $index . '.image_path')->store('images', 'public')
                    : ($articlePart ? $articlePart->image_path : null);
            } else {
                $imagePath = null;
            }

            if ($articlePart) {
                $articlePart->update([
                    'type' => $part['type'],
                    'content' => $part['content'] ?? null,
                    'order' => $part['order'],
                    'image_path' => $imagePath,
                ]);
            } else {
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
