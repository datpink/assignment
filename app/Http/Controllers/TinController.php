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
        return view("master");
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
        return view('chitiet', compact('article', 'hot'));
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
        return view('tin-trong-loai',compact('data','loaiTin','listTin'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $articles = Article::where('title', 'like', '%' . $keyword . '%')
            ->orWhere('content', 'like', '%' . $keyword . '%')
            ->with(['parts' => function ($query) {
                $query->where('type', 'image');
            }])
            ->get();

        // Trả về view hiển thị kết quả tìm kiếm với biến $articles và $keyword
        return view('timkiem', compact('articles', 'keyword'));
    }
}
