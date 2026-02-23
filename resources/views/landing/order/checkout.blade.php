@extends('layouts.app')

@section('title','Checkout | RuangKonsul')

@section('content')

<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3 class="mb-0">Checkout</h3>
                <a href="{{ route('cart.index') }}" class="text-muted small">&larr; Kembali ke Keranjang</a>
            </div>

            <!-- Items -->
            <div class="card mb-4 shadow-sm">
                <div class="card-body p-3">
                    <ul class="list-group list-group-flush">
                        @foreach($cartItems as $item)
                        <li class="list-group-item d-flex align-items-center px-0 py-3 border-0">
                            <div class="me-3" style="width:72px; height:72px; overflow:hidden; border-radius:8px;">
                                <img src="{{ asset('storage/' . ($item->produk->gambar ?? '')) }}" alt="" style="width:100%;height:100%;object-fit:cover;">
                            </div>
                            <div class="flex-grow-1">
                                <div class="fw-bold">{{ $item->produk->produkName ?? 'Produk' }}</div>
                                <div class="text-muted small">SKU: {{ $item->produkId }}</div>
                            </div>
                            <div class="text-end ms-3">
                                <div class="fw-semibold">Rp {{ number_format(($item->produk->price ?? 0) * $item->qty, 0, ',', '.') }}</div>
                                <div class="text-muted small">{{ $item->qty }} x Rp {{ number_format($item->produk->price ?? 0, 0, ',', '.') }}</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Shipping / Customer Info -->
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-white border-0">
                    <h5 class="mb-0">Data Pengiriman</h5>
                </div>
                <div class="card-body">
                    <div class="row gy-2">
                        <div class="col-md-6">
                            <label class="form-label small">Nama</label>
                            <div class="form-control-plaintext">{{ $customer->customerName ?? '-' }}</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small">Telepon</label>
                            <div class="form-control-plaintext">{{ $customer->customerNoTelp ?? '-' }}</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label small">Email</label>
                            <div class="form-control-plaintext">{{ $customer->customerEmail ?? '-' }}</div>
                        </div>
                        <div class="col-12">
                            <label class="form-label small">Alamat</label>
                            <div class="form-control-plaintext text-muted">{{ $customer->alamat ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Summary & Payment -->
        <div class="col-lg-4">
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="text-muted">Subtotal</div>
                        <div class="fw-bold">Rp {{ number_format($total ?? 0, 0, ',', '.') }}</div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="text-muted">Ongkir</div>
                        <div class="text-muted">Gratis</div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="fw-bold">Total Pembayaran</div>
                        <div class="fs-5 text-success fw-bold">Rp {{ number_format($total ?? 0, 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white border-0">
                    <h6 class="mb-0">Pilih Metode Pembayaran</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('order.process') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metodePembayaran" id="transfer" value="transfer" required>
                                <label class="form-check-label" for="transfer">
                                    <i class="icofont-bank-alt me-2"></i> Transfer Bank
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metodePembayaran" id="kartu" value="kartu">
                                <label class="form-check-label" for="kartu">
                                    <i class="icofont-credit-card me-2"></i> Kartu Kredit/Debit
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metodePembayaran" id="gopay" value="gopay">
                                <label class="form-check-label" for="gopay">
                                    <i class="icofont-money me-2"></i> GoPay
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="metodePembayaran" id="ovo" value="ovo">
                                <label class="form-check-label" for="ovo">
                                    <i class="icofont-heart me-2"></i> OVO
                                </label>
                            </div>
                        </div>

                        @error('metodePembayaran')
                            <div class="text-danger small mb-2">{{ $message }}</div>
                        @enderror

                        <button type="submit" class="btn w-100" style="background: linear-gradient(135deg,#223a66,#2b4c7e); color:#fff;">Lanjutkan Pembayaran</button>
                        <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary w-100 mt-2">Kembali ke Keranjang</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
