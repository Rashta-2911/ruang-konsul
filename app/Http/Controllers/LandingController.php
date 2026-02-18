<?php

namespace App\Http\Controllers;
use App\Models\Dokter;
use App\Models\Customer;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function tentang()
    {
        return view('landing.sections.tentang');
    }

    public function pelayanan()
    {
        return view('landing.sections.pelayanan');
    }

    public function appointment()
    {
        $dokters = Dokter::all();
        $customers = Customer::all();

        return view('landing.sections.appointment', compact('dokters', 'customers'));
    }

    public function blog()
    {
        return view('landing.sections.blog');
    }

    public function kontak()
    {
        return view('landing.sections.kontak');
    }

    public function produk()
    {
        return view('landing.produk.produk');
    }
}
