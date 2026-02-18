@extends('layouts.app')

@section('title', 'Profile | RuangKonsul')

@section('content')

<section class="section py-5" style="background: #f4f6fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">

                <!-- Card Modern Interaktif -->
                <div class="card border-0 shadow-lg rounded-3 overflow-hidden profile-card" 
                     style="transition: transform 0.3s, box-shadow 0.3s;">
                    <!-- Header dengan Gradasi -->
                    <div class="card-header text-center text-white" 
                        style="background: #223a66; background-image: repeating-linear-gradient(45deg, rgba(255,255,255,0.03) 0 8px, transparent 8px 16px);">
                        <h4 class="mb-0">Profil Customer</h4>
                    </div>

                    <div class="card-body p-4">
                        <!-- Avatar -->
                        <div class="text-center mb-4">
                            <img src="{{ $customer->avatar ? asset($customer->avatar) : asset('images/Profile/default-avatar.png') }}" 
                                 alt="Avatar" 
                                 class="rounded-circle shadow"
                                 width="120" height="120"
                                 style="border:4px solid rgba(34,58,102,0.08); box-shadow: 0 6px 20px rgba(34,58,102,0.12);">
                        </div>

                        <!-- Info List Interaktif -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center info-item">
                                <span><i class="fas fa-user me-2 text-primary" data-bs-toggle="tooltip" title="Nama lengkap customer"></i> Nama</span>
                                <span class="fw-bold">{{ $customer->customerName }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center info-item">
                                <span><i class="fas fa-envelope me-2 text-success" data-bs-toggle="tooltip" title="Email aktif"></i> Email</span>
                                <span class="fw-bold">{{ $customer->customerEmail }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center info-item">
                                <span><i class="fas fa-phone me-2 text-warning" data-bs-toggle="tooltip" title="Nomor telepon"></i> No Telp</span>
                                <span class="fw-bold">{{ $customer->customerNoTelp }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center info-item">
                                <span><i class="fas fa-map-marker-alt me-2 text-danger" data-bs-toggle="tooltip" title="Alamat rumah atau domisili"></i> Alamat</span>
                                <span class="fw-bold">{{ $customer->alamat }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-{{ $customer->customerJenisKelamin == 'Laki-laki' ? 'male' : 'female' }} me-2 text-primary"></i> Jenis Kelamin</span>
                                <span class="badge rounded-pill" style="background: #2b4c7e; color: #fff;">
                                    {{ $customer->customerJenisKelamin ?? '-' }}
                                </span>
                            </li>
                        </ul>

                        <!-- Button Edit -->
                        <div class="text-center mt-4">
                            <a href="{{ route('profile.edit') }}" class="btn btn-main btn-round-full" style="background: linear-gradient(135deg,#223a66,#2b4c7e); color:#fff; padding:0.6rem 1.25rem;">
                                <i class="fas fa-edit me-2"></i> Edit Profile
                            </a>
                        </div>

                    </div>
                </div>
                <!-- End Card -->

            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
    /* Card Hover */
    .profile-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.15);
    }

    /* Avatar Hover */
    .profile-card img:hover {
        transform: scale(1.05);
    }

    /* List Item Hover */
    .info-item {
        transition: background 0.3s, transform 0.3s;
        border-radius: 8px;
        margin-bottom: 5px;
    }

    .info-item:hover {
        background: rgba(37, 117, 252, 0.1);
        transform: translateX(5px);
    }

    /* Badge using logo color */
    .badge-gradient {
        background: #223a66;
        color: #fff;
    }

    /* Button using logo color */
    .btn-gradient-primary {
        background: #223a66;
        color: #fff;
        border: none;
    }

    .btn-gradient-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(34,60,102,0.18);
    }

    /* Tooltip custom */
    .tooltip-inner {
        background-color: #2575fc !important;
        color: #fff;
        font-size: 0.875rem;
    }

    .tooltip.bs-tooltip-top .tooltip-arrow::before {
        border-top-color: #2575fc !important;
    }
</style>
@endpush

@push('scripts')
<script>
    // Initialize Bootstrap tooltips
    document.addEventListener('DOMContentLoaded', function () {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
@endpush

@endsection
