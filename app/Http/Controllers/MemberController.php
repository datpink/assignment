<?php

namespace App\Http\Controllers;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Driver\Selector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $tinnb = Article::with(['parts' => function ($query) {
            $query->orderBy('order', 'desc');
        }])
            ->where('featured', '=', '1')
            ->limit('10')
            ->get();
        return view("layout.master", compact("tinnb"));
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

        $tinmoi = Article::query()
            ->orderBy('created_at', 'desc')
            ->limit('5')
            ->get();

        return view('member.chitiet', compact('article', 'hot', 'tinmoi','cungloai'));
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
        return view('member.tin-trong-loai', compact('data', 'loaiTin', 'listTin', 'hot', 'tinmoi'));
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

        return view('member.timkiem', compact('articles', 'keyword'));
    }

    // Đăng jys đăng nhập

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'member',
        ]);

        Auth::login($user);

        return redirect('login');
    }
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Đăng nhập thành công');
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('home');
    }

}


