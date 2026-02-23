<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormAppointment;
use Illuminate\Support\Str;
use App\Models\Dokter;
use App\Models\Customer;

class FormAppointmentController extends Controller
{
    // Menampilkan daftar appointment customer
    public function index()
    {
        if (!auth()->guard('customer')->check()) {
            return redirect()->route('login');
        }

        $appointments = FormAppointment::with('dokter')
            ->where('customerId', auth()->guard('customer')->user()->customerId)
            ->orderBy('date', 'desc')
            ->orderBy('time', 'desc')
            ->get();

        return view('landing.customer.appointments', compact('appointments'));
    }

    // Menampilkan form
    public function create()
    {
        $dokters = Dokter::all();
        $customers = Customer::all();

        return view('landing.sections.appointment', compact('dokters', 'customers'));
    }

    // Menyimpan data
    public function store(Request $request)
    {
        // Pastikan customer sudah login
        if (!auth()->guard('customer')->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Validasi input
        $request->validate([
            'dokterId' => 'required|exists:dokter,dokterId',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'pesan' => 'nullable|max:225',
        ]);

        // Simpan data
        FormAppointment::create([
            'appointmentId' => Str::upper(Str::random(5)), // generate ID unik
            'customerId' => auth()->guard('customer')->user()->customerId,
            'dokterId' => $request->dokterId,
            'date' => $request->date,
            'time' => $request->time,
            'pesan' => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Appointment berhasil dibuat!');
    }
}
