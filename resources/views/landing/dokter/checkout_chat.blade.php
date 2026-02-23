@extends('layouts.app')

@section('title', 'Pembayaran Chat Dokter | RuangKonsul')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="section-title text-center mb-5">
                <h2 class="mb-2">Konfirmasi Pembayaran</h2>
                <div class="divider mx-auto mb-3"></div>
                <p class="text-muted">Satu langkah lagi untuk mulai berkonsultasi dengan dokter pilihan Anda.</p>
            </div>

            <div class="card shadow-sm border-0 rounded-lg overflow-hidden" style="box-shadow: 0 10px 30px rgba(0,0,0,0.08) !important;">
                <div class="row g-0">
                    <div class="col-md-5 p-5 text-center" style="background-color: #f4f9fc;">
                        <div class="mb-4">
                            @php
                                $imagePath = file_exists(public_path($chat->dokter->gambar)) ? asset($chat->dokter->gambar) : asset('storage/' . $chat->dokter->gambar);
                            @endphp
                            <div class="position-relative d-inline-block">
                                <img src="{{ $imagePath }}" 
                                     alt="{{ $chat->dokter->dokterName }}" 
                                     class="rounded-circle shadow-sm border border-5 border-white"
                                     style="width: 180px; height: 180px; object-fit: cover;">
                                <span class="position-absolute bottom-0 end-0 bg-success border border-white border-2 rounded-circle" style="width: 25px; height: 25px;"></span>
                            </div>
                        </div>
                        <h4 class="title-color mb-1">{{ $chat->dokter->dokterName }}</h4>
                        <p class="text-muted small mb-4">{{ ucwords($chat->dokter->namaBidang) }}</p>
                        
                        <div class="py-3 px-4 rounded-pill d-inline-block" style="background-color: #fff; border: 1px dashed #223a66;">
                            <span class="text-muted small d-block">Biaya Konsultasi</span>
                            <h4 class="text-color-2 mb-0 fw-bold">Rp {{ number_format($chat->price ?? $chat->dokter->hargaKonsultasi, 0, ',', '.') }}</h4>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <div class="card-body p-5">
                            <h5 class="mb-4 title-color fw-bold">Pilih Metode Pembayaran</h5>
                            
                            <form action="{{ route('landing.dokter.processChatPayment', $chat->chatDokterId) }}" method="POST" id="paymentForm">
                                @csrf
                                
                                <div class="payment-methods mb-4">
                                    <div class="form-check p-0 mb-3">
                                        <input class="form-check-input d-none" type="radio" name="metodePembayaran" id="p_transfer" value="transfer" required checked>
                                        <label class="payment-label d-flex align-items-center p-3 border rounded w-100 cursor-pointer transition-all" for="p_transfer">
                                            <div class="method-icon rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                                <i class="icofont-bank-alt fs-5 text-color"></i>
                                            </div>
                                            <span class="fw-semibold">Transfer Bank</span>
                                            <i class="icofont-check-circled ms-auto text-success fs-4 check-icon opacity-0"></i>
                                        </label>
                                    </div>
                                    
                                    <div class="form-check p-0 mb-3">
                                        <input class="form-check-input d-none" type="radio" name="metodePembayaran" id="p_kartu" value="kartu">
                                        <label class="payment-label d-flex align-items-center p-3 border rounded w-100 cursor-pointer transition-all" for="p_kartu">
                                            <div class="method-icon rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                                <i class="icofont-credit-card fs-5 text-color"></i>
                                            </div>
                                            <span class="fw-semibold">Kartu Kredit</span>
                                            <i class="icofont-check-circled ms-auto text-success fs-4 check-icon opacity-0"></i>
                                        </label>
                                    </div>

                                    <div class="form-check p-0 mb-3">
                                        <input class="form-check-input d-none" type="radio" name="metodePembayaran" id="p_gopay" value="gopay">
                                        <label class="payment-label d-flex align-items-center p-3 border rounded w-100 cursor-pointer transition-all" for="p_gopay">
                                            <div class="method-icon rounded-circle bg-light d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                                <i class="icofont-wallet fs-5 text-color"></i>
                                            </div>
                                            <span class="fw-semibold">GoPay / Digital Wallet</span>
                                            <i class="icofont-check-circled ms-auto text-success fs-4 check-icon opacity-0"></i>
                                        </label>
                                    </div>
                                </div>

                                <div class="bg-light p-3 rounded mb-4 small border-start border-4 border-info">
                                    <p class="mb-0 text-muted">Akses chat akan terbuka secara otomatis segera setelah sistem kami memverifikasi pembayaran Anda.</p>
                                </div>

                                <button type="submit" id="submitBtn" class="btn btn-main btn-round-full w-100 py-3 mb-3 shadow-sm border-0">
                                    BAYAR SEKARANG <i class="icofont-arrow-right ms-2"></i>
                                </button>
                                
                                <a href="{{ route('landing.dokter.list', ['kategori' => $chat->dokter->namaBidang]) }}" class="btn btn-solid-border btn-round-full w-100 text-center">
                                    KEMBALI KE LIST
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const form = this;
        const submitBtn = document.getElementById('submitBtn');
        const originalText = submitBtn.innerHTML;
        
        // Disable button
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span> MEMPROSES...';

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Pembayaran Berhasil!',
                    text: data.message,
                    icon: 'success',
                    confirmButtonText: 'Buka Chat Sekarang',
                    confirmButtonColor: '#223a66',
                    showClass: {
                        popup: 'animate__animated animate__zoomIn'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__zoomOut'
                    }
                }).then((result) => {
                    if (result.isConfirmed || result.dismiss) {
                        window.location.href = data.redirect;
                    }
                });
            } else {
                throw new Error(data.message || 'Terjadi kesalahan');
            }
        })
        .catch(error => {
            Swal.fire({
                title: 'Gagal!',
                text: error.message,
                icon: 'error',
                confirmButtonColor: '#e12454'
            });
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        });
    });
</script>

<style>
    .transition-all { transition: all 0.3s ease; }
    .cursor-pointer { cursor: pointer; }
    
    .payment-label:hover {
        background-color: #fcfcfc;
        border-color: #223a66 !important;
    }
    
    input[type="radio"]:checked + .payment-label {
        border-color: #223a66 !important;
        background-color: rgba(34, 58, 102, 0.03);
        box-shadow: 0 4px 12px rgba(34, 58, 102, 0.08);
    }
    
    input[type="radio"]:checked + .payment-label .check-icon {
        opacity: 1;
    }
    
    input[type="radio"]:checked + .payment-label .method-icon {
        background-color: #223a66 !important;
    }
    
    input[type="radio"]:checked + .payment-label .method-icon i {
        color: #fff !important;
    }
</style>

@endsection
