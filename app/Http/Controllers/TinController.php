<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Driver\Selector;

class TinController extends Controller
{
    public function index()
    {
        $tinnb = Article::with(['parts' => function ($query) {
            $query->orderBy('order', 'desc');
        }])
            ->where('featured', '=', '1')
            ->limit('10')
            ->get();
        return view("master", compact("tinnb"));
    }

    public function find($id)
    {
        $article = Article::with(['parts' => function ($query) {
            $query->orderBy('order');
        }])->findOrFail($id);

        $hot = Article::with(['parts' => function ($query) {
            $query->orderBy('order', 'desc');
        }])
            ->orderBy('view_count', 'desc')
            ->limit(5)
            ->get();

        $product = Article::find($id);

        // Lấy ra category_id từ sản phẩm
        $categoryId = $product->category_id;
        $cungloai = Article::with(['parts' => function ($query) {
            $query->orderBy('order', 'desc');
        }])
            ->where('category_id', '=', $categoryId)
            ->orderBy('view_count', 'desc')
            ->limit(5)
            ->get();

        $tinmoi = DB::table('articles')
            ->orderBy('created_at', 'desc')
            ->limit('5')
            ->get();

        return view('chitiet', compact('article', 'hot', 'tinmoi','cungloai'));
    }

    public function tinTrongLoai($idct)
    {
        $listTin = Article::with('parts')
            ->where('category_id', $idct)
            ->get();
        $loaiTin = DB::table('categories')
            ->where('id', $idct)
            ->first();
        $data = ['idLT' => $idct, 'listTin' => $listTin];

        $hot = Article::with(['parts' => function ($query) {
            $query->orderBy('order', 'desc');
        }])
            ->orderBy('view_count', 'desc')
            ->limit(5)
            ->get();
        $tinmoi = DB::table('articles')
            ->orderBy('created_at', 'desc')
            ->limit('5')
            ->get();
        return view('tin-trong-loai', compact('data', 'loaiTin', 'listTin', 'hot', 'tinmoi'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $articles = Article::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('content', 'like', '%' . $keyword . '%')
            ->orderBy('created_at', 'desc')
            ->with(['parts' => function ($query) {
                $query->where('type', 'image');
            }])
            ->paginate(5);

        return view('timkiem', compact('articles', 'keyword'));
    }
}
