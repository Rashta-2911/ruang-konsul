@extends('layouts.app')

@section('title','Riwayat Pesanan | RuangKonsul')

@section('content')

<div class="container py-5">
    <h3 class="mb-4">Riwayat Pesanan</h3>

    @if($pemesanan->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No. Pesanan</th>
                        <th>Tanggal</th>
                        <th>Jumlah Item</th>
                        <th>Total</th>
                        <th>Status Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pemesanan as $order)
                        <tr>
                            <td>
                                <span class="badge badge-primary">{{ $order->pemesananId }}</span>
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($order->date)->format('d M Y') }}
                            </td>
                            <td>
                                {{ $order->detailPemesanan->count() }} produk
                            </td>
                            <td>
                                <strong class="text-success">
                                    Rp {{ number_format($order->totalPrice ?? 0, 0, ',', '.') }}
                                </strong>
                            </td>
                            <td>
                                @if($order->pembayaran)
                                    @if($order->pembayaran->status == 'pending')
                                        <span class="badge badge-warning">Menunggu Pembayaran</span>
                                    @elseif($order->pembayaran->status == 'paid')
                                        <span class="badge badge-success">Sudah Dibayar</span>
                                    @else
                                        <span class="badge badge-danger">Gagal</span>
                                    @endif
                                @else
                                    <span class="badge badge-secondary">-</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('order.success', $order->pemesananId) }}" class="btn btn-sm btn-primary">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info text-center py-5">
            <p class="mb-0">Anda belum memiliki riwayat pesanan.</p>
            <a href="{{ route('produk.index') }}" class="btn btn-primary mt-3">
                Mulai Berbelanja
            </a>
        </div>
    @endif
</div>

@endsection
