@extends('layouts.app')

@section('title','Pesanan Berhasil | RuangKonsul')

@section('content')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-success">
                <div class="card-body text-center py-5">
                    <div style="font-size: 64px; color: #28a745; margin-bottom: 20px;">
                        ✓
                    </div>
                    
                    <h2 class="text-success mb-3">Pesanan Berhasil Dibuat!</h2>
                    
                    <p class="text-muted mb-4">
                        Terima kasih telah berbelanja di RuangKonsul. Pesanan Anda sedang diproses.
                    </p>

                    <!-- Detail Pesanan -->
                    <div class="card mb-4 text-left">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Detail Pesanan</h5>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-6">
                                    <strong>Nomor Pesanan:</strong>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="badge badge-primary" style="font-size: 14px;">{{ $pemesanan->pemesananId }}</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <strong>Tanggal Pesanan:</strong>
                                </div>
                                <div class="col-6 text-right">
                                    {{ \Carbon\Carbon::parse($pemesanan->date)->format('d M Y') }}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <strong>Total Pembayaran:</strong>
                                </div>
                                <div class="col-6 text-right">
                                    <span class="text-success font-weight-bold" style="font-size: 18px;">
                                        Rp {{ number_format($pemesanan->totalPrice ?? 0, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-6">
                                    <strong>Status Pembayaran:</strong>
                                </div>
                                <div class="col-6 text-right">
                                    @if($pemesanan->pembayaran)
                                        @if($pemesanan->pembayaran->status == 'pending')
                                            <span class="badge badge-warning">Menunggu Pembayaran</span>
                                        @elseif($pemesanan->pembayaran->status == 'paid')
                                            <span class="badge badge-success">Sudah Dibayar</span>
                                        @else
                                            <span class="badge badge-danger">Gagal</span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Item Pesanan -->
                    <div class="card mb-4">
                        <div class="card-header bg-light">
                            <h5 class="mb-0">Produk yang Dipesan</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Harga Satuan</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pemesanan->detailPemesanan as $detail)
                                            <tr>
                                                <td>
                                                    @if($detail->produk)
                                                        <div class="d-flex align-items-center">
                                                            <div style="width:40px;height:40px;overflow:hidden;margin-right:10px;">
                                                                <img src="{{ asset($detail->produk->gambar ?? '') }}" style="width:100%;height:100%;object-fit:cover;">
                                                            </div>
                                                            <div>
                                                                <strong>{{ $detail->produk->produkName ?? 'Produk' }}</strong><br>
                                                                <small class="text-muted">{{ $detail->produkId }}</small>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>Rp {{ number_format($detail->hargaSatuan ?? 0, 0, ',', '.') }}</td>
                                                <td>{{ $detail->qty ?? 1 }}</td>
                                                <td class="font-weight-bold">
                                                    Rp {{ number_format(($detail->hargaSatuan ?? 0) * ($detail->qty ?? 1), 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Metode Pembayaran -->
                    @if($pemesanan->pembayaran)
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Metode Pembayaran</h5>
                            </div>
                            <div class="card-body text-left">
                                <p class="mb-1">
                                    <strong>Metode:</strong> 
                                    @php
                                        $metode = $pemesanan->pembayaran->metodePembayaran;
                                        if($metode == 'transfer') echo '💳 Transfer Bank';
                                        elseif($metode == 'kartu') echo '💳 Kartu Kredit/Debit';
                                        elseif($metode == 'gopay') echo '🔔 GoPay';
                                        elseif($metode == 'ovo') echo '💜 OVO';
                                    @endphp
                                </p>
                                <p class="mb-0">
                                    <strong>Tanggal Pembayaran:</strong> 
                                    {{ $pemesanan->pembayaran->date ? \Carbon\Carbon::parse($pemesanan->pembayaran->date)->format('d M Y') : '-' }}
                                </p>
                            </div>
                        </div>
                    @endif

                    <!-- Tombol Aksi -->
                    <div class="mt-5">
                        <a href="{{ route('order.history') }}" class="btn btn-primary btn-lg">
                            Lihat Riwayat Pesanan
                        </a>
                        <a href="{{ route('home') }}" class="btn btn-secondary btn-lg">
                            Kembali ke Beranda
                        </a>
                    </div>
                </div>
            </div>

            <!-- Info Penting -->
            <div class="alert alert-info mt-4">
                <h5>📝 Informasi Penting</h5>
                <ul class="mb-0">
                    <li>Silakan simpan nomor pesanan Anda untuk keperluan verifikasi.</li>
                    <li>Email konfirmasi akan dikirim ke {{ $pemesanan->customer->customerEmail ?? '' }}</li>
                    <li>Hubungi customer service jika ada pertanyaan tentang pesanan Anda.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
