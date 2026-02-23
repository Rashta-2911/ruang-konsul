@extends('layouts.app')

@section('title', 'Jadwal Janji Temu | RuangKonsul')

@section('content')
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="text-capitalize mb-5 text-lg text-white">Jadwal Janji Temu</h1>
      </div>
    </div>
  </div>
</section>

<section class="section appoinment-schedule" style="background: #f4f9fc;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <h2>Daftar Janji Temu Anda</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p>Berikut adalah riwayat dan jadwal janji temu yang telah Anda buat di RuangKonsul.</p>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($appointments as $appointment)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden; height: 100%;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="icon-box" style="width: 50px; height: 50px; background: rgba(34, 58, 102, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                <i class="icofont-calendar text-primary" style="font-size: 24px;"></i>
                            </div>
                            <div>
                                <h5 class="mb-0">{{ \Carbon\Carbon::parse($appointment->date)->translatedFormat('d F Y') }}</h5>
                                <small class="text-muted"><i class="icofont-clock-time mr-1"></i> {{ \Carbon\Carbon::parse($appointment->time)->format('H:i') }} WIB</small>
                            </div>
                        </div>
                        
                        <div class="info-item mb-3">
                            <h6 class="text-muted mb-1" style="font-size: 11px; text-uppercase; letter-spacing: 1px;">Dokter</h6>
                            <p class="mb-0" style="font-weight: 600; color: #223a66;">
                                <i class="icofont-doctor-alt mr-2"></i>
                                {{ $appointment->dokter->dokterName ?? 'Dokter tidak ditemukan' }}
                            </p>
                        </div>

                        <div class="info-item">
                            <h6 class="text-muted mb-1" style="font-size: 11px; text-uppercase; letter-spacing: 1px;">Pesan/Keluhan</h6>
                            <p class="mb-0 text-secondary" style="font-style: italic;">
                                "{{ $appointment->pesan ?? '-' }}"
                            </p>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 px-4 pb-4 pt-0">
                        @php
                            $isFuture = \Carbon\Carbon::parse($appointment->date . ' ' . $appointment->time)->isFuture();
                        @endphp
                        @if($isFuture)
                            <div class="badge badge-primary py-2 px-3" style="border-radius: 50px;">
                                <i class="icofont-check-circled mr-1"></i> Terjadwal
                            </div>
                        @else
                            <div class="badge badge-secondary py-2 px-3" style="border-radius: 50px;">
                                <i class="icofont-history mr-1"></i> Selesai
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <div class="alert alert-info py-4">
                    <i class="icofont-info-circle mb-3 d-block" style="font-size: 40px;"></i>
                    <p class="mb-0">Anda belum memiliki jadwal janji temu.</p>
                    <a href="{{ route('landing.sections.appointment') }}" class="btn btn-main btn-round-full mt-3">Buat Janji Sekarang</a>
                </div>
            </div>
            @endforelse
        </div>

        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ url('/') }}" class="btn btn-secondary btn-round-full">
                    <i class="icofont-arrow-left mr-2"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
</style>
@endsection
