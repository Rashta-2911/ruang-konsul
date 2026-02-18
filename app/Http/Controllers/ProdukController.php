<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Menampilkan semua kategori di halaman produk
     * Route: /produk
     * View: landing/produk/index.blade.php
     */
    public function index()
    {
        // Ambil semua kategori dengan jumlah produk
        $kategoris = Kategori::withCount('produk')
                            ->orderBy('kategoriId', 'asc')
                            ->get();
        
        return view('landing.produk.index1', compact('kategoris'));
    }

    /**
     * Menampilkan produk berdasarkan kategori
     * Route: /detailproduk/{kategoriId}
     * View: landing/detailproduk/show.blade.php
     */
    public function show($kategoriId)
    {
        // Ambil kategori berdasarkan ID
        $kategori = Kategori::where('kategoriId', $kategoriId)->firstOrFail();
        
        // Ambil semua produk dalam kategori tersebut
        $produks = Produk::where('kategoriId', $kategoriId)
                         ->orderBy('produkName', 'asc')
                         ->get();
        
        return view('landing.detailproduk.show', compact('kategori', 'produks'));
    }

    /**
     * Menampilkan detail produk individual (opsional)
     * Route: /detailproduk/{kategoriId}/{produkId}
     * Jika Anda ingin halaman detail per produk
     */
    public function detail($kategoriId, $produkId)
    {
        $produk = Produk::where('produkId', $produkId)
                        ->where('kategoriId', $kategoriId)
                        ->with('kategori')
                        ->firstOrFail();
        
        // Produk terkait dari kategori yang sama
        $relatedProducts = Produk::where('kategoriId', $kategoriId)
                                  ->where('produkId', '!=', $produkId)
                                  ->where('qty', '>', 0) // hanya yang ada stok
                                  ->limit(4)
                                  ->get();
        
        return view('landing.detailproduk.detail', compact('produk', 'relatedProducts'));
    }

    /**
     * Search produk (opsional)
     * Route: GET /produk/search?q=keyword
     */
    public function search(Request $request)
    {
        $query = $request->input('q');
        
        if (!$query) {
            return redirect()->route('produk.index');
        }
        
        $produks = Produk::where('produkName', 'LIKE', "%{$query}%")
                         ->orWhere('produkId', 'LIKE', "%{$query}%")
                         ->with('kategori')
                         ->paginate(12);
        
        return view('landing.produk.search', compact('produks', 'query'));
    }

    /**
     * Filter produk by price range (opsional)
     * Route: GET /detailproduk/{kategoriId}?min=0&max=100000
     */
    public function filterByPrice(Request $request, $kategoriId)
    {
        $minPrice = $request->input('min', 0);
        $maxPrice = $request->input('max', 9999999);
        
        $kategori = Kategori::where('kategoriId', $kategoriId)->firstOrFail();
        
        $produks = Produk::where('kategoriId', $kategoriId)
                         ->whereBetween('price', [$minPrice, $maxPrice])
                         ->orderBy('price', 'asc')
                         ->get();
        
        return view('landing.detailproduk.show', compact('kategori', 'produks'));
    }

    /**
     * API endpoint untuk mendapatkan produk berdasarkan kategori (untuk AJAX)
     * Route: GET /api/produk/{kategoriId}
     */
    public function getProductsByCategory($kategoriId)
    {
        $produks = Produk::where('kategoriId', $kategoriId)
                         ->where('qty', '>', 0)
                         ->get();
        
        return response()->json([
            'success' => true,
            'data' => $produks
        ]);
    }
}