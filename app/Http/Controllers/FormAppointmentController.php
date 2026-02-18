<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormAppointment;
use Illuminate\Support\Str;
use App\Models\Dokter;
use App\Models\Customer;

class FormAppointmentController extends Controller
{
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
        // Validasi input
        $request->validate([
            'customerId' => 'required|max:5',
            'dokterId' => 'required|max:5',
            'date' => 'required|date',
            'time' => 'required',
            'pesan' => 'nullable|max:225',
        ]);

        // Simpan data
        FormAppointment::create([
            'appointmentId' => Str::upper(Str::random(5)), // generate ID unik
            'customerId' => $request->customerId,
            'dokterId' => $request->dokterId,
            'date' => $request->date,
            'time' => $request->time,
            'pesan' => $request->pesan,
        ]);

        return redirect()->back()->with('success', 'Appointment berhasil dibuat!');
    }
}
