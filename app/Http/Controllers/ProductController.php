<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('category')
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->when($request->sort, function ($query) use ($request) {
                $query->orderBy('price', $request->sort);
            })
            ->paginate(5);

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required',
            'image' => 'nullable|image'
        ]);

   if ($request->hasFile('image')) {
    $data['image'] = $request->file('image')->store('products', 'public');
}

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Thêm thành công!');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'category_id' => 'required',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
    $data['image'] = $request->file('image')->store('products', 'public');
}

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Cập nhật thành công!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Xóa thành công!');
    }
    // 🏠 Trang chủ (shop)
public function home(Request $request)
{
    $products = Product::with('category')
        ->latest()
        ->paginate(8)
        ->withQueryString();

    return view('home', compact('products'));
}

// ⚙️ Dashboard (admin)
public function dashboard(Request $request)
{
    $type = $request->get('type', 'day');

    // 📊 Chart data
    if ($type == 'month') {
        $chart = Product::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as label, COUNT(*) as total')
            ->groupBy('label')
            ->orderBy('label')
            ->get();
    } else {
        $chart = Product::selectRaw('DATE(created_at) as label, COUNT(*) as total')
            ->groupBy('label')
            ->orderBy('label')
            ->get();
    }

    // 📊 Format label đẹp
    $chartLabels = $chart->pluck('label')->map(function ($item) use ($type) {
        if ($type == 'day') {
            return \Carbon\Carbon::parse($item)->format('d/m');
        }
        return \Carbon\Carbon::parse($item . '-01')->format('m/Y');
    });

    $chartData = $chart->pluck('total');

    // 📦 Thống kê
    $totalProducts = Product::count();
    $todayProducts = Product::whereDate('created_at', today())->count();
    $monthProducts = Product::whereMonth('created_at', now()->month)->count();

    // 💰 Top giá
    $topProducts = Product::orderByDesc('price')->take(5)->get();

    // 📂 Danh mục
    $categoryStats = Category::withCount('products')->get();

    return view('dashboard', compact(
        'chartLabels',
        'chartData',
        'type',
        'totalProducts',
        'todayProducts',
        'monthProducts',
        'topProducts',
        'categoryStats'
    ));
}

public function history()
{
    $products = Product::latest()->paginate(10);
    return view('history', compact('products'));
}
}