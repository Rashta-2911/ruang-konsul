<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class DetailProdukController extends Controller
{
    // Halaman kategori Kesehatan Mental
    public function kesehatanMental()
    {
        return view('landing.detailproduk.kesehatan-mental');
    }

    // Halaman kategori Kesehatan Seksual
    public function kesehatanSeksual()
    {
        return view('landing.detailproduk.kesehatan-seksual');
    }

    // Halaman kategori Ibu & Anak
    public function ibuAnak()
    {
        return view('landing.detailproduk.ibu-anak');
    }

    // Halaman kategori Gaya Hidup Sehat
    public function gayaHidup()
    {
        return view('landing.detailproduk.gaya-hidup');
    }

    // Halaman kategori Penyakit Kronis
    public function penyakitKronis()
    {
        return view('landing.detailproduk.penyakit-kronis');
    }

    // Halaman kategori Gizi & Nutrisi
    public function giziNutrisi()
    {
        return view('landing.detailproduk.gizi-nutrisi');
    }

    // Handle checkout (POST)
    public function checkout(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        $items = Cart::with('produk')
            ->where('customerId', $customer->customerId)
            ->get();

        if($items->isEmpty()){
            return redirect()->back()->with('error', 'Keranjang kosong.');
        }

        $total = $items->sum(function($it){
            return ($it->produk->price ?? 0) * $it->qty;
        });

        // NOTE: no order model implemented — simulate checkout by clearing the cart
        Cart::where('customerId', $customer->customerId)->delete();

        return redirect()->route('home')
            ->with('success', 'Pembayaran berhasil. Total: Rp ' . number_format($total,0,',','.'));
    }
}
