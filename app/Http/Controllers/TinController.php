<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TinController extends Controller
{
    public function index()
    {
        return view("master");
    }

    public function find($id)
    {
        $article = Article::with(['parts' => function ($query) {
            $query->orderBy('order');
        }])->findOrFail($id);
        return view('chitiet', compact('article'));
    }

    public function tinTrongLoai($idct)
    {
        $listTin = Article::with('parts')
            ->where('category_id', $idct)
            ->get();
        $articles = Article::with(['parts' => function ($query) {
            $query->where('type', 'image')->orderBy('order');
        }])->where('category_id', $idct)->get();
        $data = ['idLT' => $idct, 'listTin' => $listTin];
        return view('tin-trong-loai', $data);
    }
    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $articles = Article::where('title', 'like', '%'.$keyword.'%')
                            ->orWhere('content', 'like', '%'.$keyword.'%')
                            ->with(['parts' => function ($query) {
                                $query->where('type', 'image');
                            }])
                            ->get();

        // Trả về view hiển thị kết quả tìm kiếm với biến $articles và $keyword
        return view('timkiem', compact('articles', 'keyword'));
    }
}
