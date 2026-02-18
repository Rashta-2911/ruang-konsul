@extends('layouts.app')

@section('title', 'Kategori Dokter | RuangKonsul')

@section('meta_description', 'RuangKonsul - Konsultasi kesehatan online profesional')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dokter.css') }}">
@endpush

@section('content')

<section class="section">
    <div class="container">

        <h2 class="mb-2 fw-bold">Pilih Kategori Dokter</h2>
        <p class="text-muted mb-4">
            Konsultasi dengan dokter sesuai kebutuhan kamu
        </p>

        <!-- SEARCH -->
        <form method="GET" class="mb-4">
            <input type="text"
                   name="search"
                   value="{{ $search ?? '' }}"
                   class="form-control form-control-lg"
                   placeholder="Cari kategori (mental, gizi, parenting...)">
        </form>

        <div class="row">

    @php
        // Mapping kategori → icon icofont
        $iconMap = [
            'kesehatan mental' => 'icofont-brain',
            'gizi dan nutrisi' => 'icofont-apple',
            'parenting' => 'icofont-baby',
            'ibu dan anak' => 'icofont-baby-teddy-bear',
            'kesehatan seksual' => 'icofont-heart',
            'penyakit kronis' => 'icofont-medical-sign',
            'gaya hidup sehat' => 'icofont-runner',
            'umum' => 'icofont-stethoscope'
        ];
    @endphp

   @forelse($kategori as $k)

    @php
        $nama = strtolower($k->namaBidang);
        $icon = 'icofont-doctor'; // default

        if (str_contains($nama, 'psikolog') || str_contains($nama, 'mental')) {
            $icon = 'icofont-brain';
        }
        elseif (str_contains($nama, 'anak') || str_contains($nama, 'pediatric')) {
            $icon = 'icofont-baby';
        }
        elseif (str_contains($nama, 'urologi')) {
            $icon = 'icofont-pills';
        }
        elseif (str_contains($nama, 'gizi')) {
            $icon = 'icofont-apple';
        }
        elseif (str_contains($nama, 'penyakit dalam')) {
            $icon = 'icofont-stethoscope';
        }
        elseif (str_contains($nama, 'olahraga')) {
            $icon = 'icofont-runner';
        }
    @endphp

    <div class="col-lg-4 col-md-6 mb-4">
        <a href="{{ route('landing.dokter.list', $k->namaBidang) }}"
           class="text-decoration-none">

            <div class="card shadow-sm border-0 h-100 text-center p-4 category-card position-relative">

                <div class="mb-3">
                    <i class="{{ $icon }} fs-1 text-primary"></i>
                </div>

                <h5 class="fw-semibold mb-2">
                    {{ ucwords($k->namaBidang) }}
                </h5>

                <small class="text-muted d-block mb-2">
                    {{ $k->count }} Dokter
                </small>

                @if($k->online_count > 0)
                    <div style="position: absolute; top: 15px; right: 15px;">
                        <span class="badge bg-success" style="font-size: 11px;">
                            <i class="icofont-check-alt" style="margin-right: 4px;"></i>
                            {{ $k->online_count }} Online
                        </span>
                    </div>
                @endif

            </div>

        </a>
    </div>

@empty

        <div class="col-12">
            <div class="alert alert-warning text-center">
                Kategori tidak ditemukan.
            </div>
        </div>
    @endforelse

</div>


    </div>
</section>

@endsection
