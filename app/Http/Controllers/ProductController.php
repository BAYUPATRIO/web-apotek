<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('produk.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('produk.show', compact('product'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        $products = Product::where('name', 'LIKE', "%$query%")
                            ->orWhere('category', 'LIKE', "%$query%")
                            ->get();
        return view('produk.index', compact('products'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category' => 'required',
            'image' => 'nullable|image',
            'status' => 'required',
            'stock' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images');
        }

        Product::create($data);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }
}

