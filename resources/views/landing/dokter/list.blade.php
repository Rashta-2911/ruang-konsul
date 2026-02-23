@extends('layouts.app')

@section('title', 'list | RuangKonsul')

@section('meta_description', 'RuangKonsul - Konsultasi kesehatan online profesional')

@section('content')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/dokter.css') }}">
@endpush

<section class="section">
    <div class="container">

        <h3 class="fw-bold mb-4">
            Dokter {{ ucwords($kategori) }}
        </h3>

        <div class="row">
            @foreach($dokter as $d)
            <div class="col-lg-4 col-md-6 mb-5">

                <div class="card doctor-card text-center pt-5">

                    @php
                      $imagePath = file_exists(public_path($d->gambar)) ? asset($d->gambar) : asset('storage/' . $d->gambar);
                    @endphp
                    <img src="{{ $imagePath }}"
                         class="doctor-avatar"
                         alt="{{ $d->dokterName }}">

                    <div class="card-body">

                        <h5 class="fw-semibold">
                            {{ $d->dokterName }}
                        </h5>

                        <span class="badge-category mb-2 d-inline-block">
                            {{ ucwords($d->namaBidang) }}
                        </span>

                        <!-- PRICE — diambil dari hargaKonsultasi dokter -->
                        <div class="mb-2 fw-bold text-primary">
                            Rp {{ number_format($d->hargaKonsultasi, 0, ',', '.') }}
                        </div>

                        <!-- STATUS DOKTER -->
                        @php
                            $status = strtolower($d->statusDokter ?? 'offline');

                            $statusConfig = [
                                'online'   => ['color' => '#90EE90', 'text' => '#006400', 'label' => 'Online'],
                                'offline'  => ['color' => '#D3D3D3', 'text' => '#696969', 'label' => 'Offline'],
                                'sibuk'    => ['color' => '#FFB6C6', 'text' => '#8B0000', 'label' => 'Sibuk'],
                                'tersedia' => ['color' => '#ADD8E6', 'text' => '#000080', 'label' => 'Tersedia'],
                            ];

                            $config = $statusConfig[$status] ?? $statusConfig['offline'];
                        @endphp

                        <div class="mb-2">
                            <span style="background-color: {{ $config['color'] }}; color: {{ $config['text'] }}; padding: 6px 12px; border-radius: 20px; display: inline-block; font-size: 12px; font-weight: 500;">
                                {{ $config['label'] }}
                            </span>
                        </div>

                        <!-- CHAT STATUS -->
                        @auth('customer')
                            @if(isset($d->chat) && $d->chat)
                                @php
                                    $chatStatus = strtolower($d->chat->status);

                                    $chatStatusConfig = [
                                        'online'   => ['color' => '#90EE90', 'text' => '#006400', 'label' => 'Online'],
                                        'offline'  => ['color' => '#D3D3D3', 'text' => '#696969', 'label' => 'Offline'],
                                        'sibuk'    => ['color' => '#FFB6C6', 'text' => '#8B0000', 'label' => 'Sibuk'],
                                        'tersedia' => ['color' => '#ADD8E6', 'text' => '#000080', 'label' => 'Tersedia'],
                                    ];

                                    $chatConfig = $chatStatusConfig[$chatStatus] ?? ['color' => '#e2e3e5', 'text' => '#383d41', 'label' => ucfirst($chatStatus)];
                                @endphp

                                <div class="mb-2">
                                    <small class="d-block text-muted mb-1">
                                        <i class="icofont-chat"></i> Status Chat:
                                    </small>
                                    <span style="background-color: {{ $chatConfig['color'] }}; color: {{ $chatConfig['text'] }}; padding: 4px 10px; border-radius: 20px; font-size: 12px; font-weight: 500;">
                                        {{ $chatConfig['label'] }}
                                    </span>
                                </div>
                            @endif
                        @endauth

                        <!-- DATE / SCHEDULE -->
                        <p class="text-muted small mb-3">
                            Jadwal: {{ \Carbon\Carbon::parse($d->jadwalPraktik)->format('d M Y H:i') ?? '-' }}
                        </p>

                        <!-- BUTTON -->
                        @auth('customer')
                            @if(isset($d->chat) && $d->chat)
                                @if($d->chat->is_paid)
                                    <a href="{{ route('landing.dokter.chat', $d->dokterId) }}" class="btn btn-success w-100">
                                        <i class="icofont-chat me-1"></i> Buka Chat
                                    </a>
                                @else
                                    <a href="{{ route('landing.dokter.checkoutChat', $d->chat->chatDokterId) }}" class="btn btn-warning w-100 fw-bold">
                                        <i class="icofont-pay me-1"></i> Bayar Chat
                                    </a>
                                @endif
                            @else
                                <form action="{{ route('landing.dokter.storeChat', $d->dokterId) }}" method="POST" style="display:inline; width: 100%;">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-100">
                                        Chat Dokter
                                    </button>
                                </form>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">
                                Login untuk Chat
                            </a>
                        @endauth

                    </div>

                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>
@endsection