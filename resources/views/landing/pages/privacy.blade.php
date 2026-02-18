@extends('layouts.app')

@section('title','Kebijakan Privasi | RuangKonsul')
@section('meta_description','Kebijakan Privasi RuangKonsul')

@section('content')
@push('styles')
<style>
  .page-hero-privacy{background:linear-gradient(135deg,#223a66 0%,#2b4c7e 100%);color:#fff;padding:48px 0;border-radius:14px;margin-bottom:24px}
  .policy-card{border-radius:12px;box-shadow:0 10px 30px rgba(34,58,102,0.08);padding:24px;background:white;color:#223a66}
  .policy-list li{margin-bottom:10px}
</style>
@endpush

<section class="py-5">
  <div class="container">
    <div class="page-hero-privacy text-center">
      <div class="container">
        <h1 style="font-weight:800;">Kebijakan Privasi</h1>
        <p style="opacity:.92;margin-top:8px;">Privasi Anda penting — berikut ringkasan bagaimana kami mengelola data Anda.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="policy-card">
          <h4 style="font-weight:700">Ringkasan</h4>
          <p class="text-muted">Kami mengumpulkan beberapa informasi dasar untuk menyediakan layanan, memperbaiki pengalaman, dan mengamankan akun Anda.</p>

          <h5 class="mt-3">Informasi yang Kami Kumpulkan</h5>
          <ul class="policy-list">
            <li><strong>Informasi Akun:</strong> nama, email, nomor telepon.</li>
            <li><strong>Transaksi & Pesanan:</strong> riwayat pembelian dan pengiriman.</li>
            <li><strong>Interaksi:</strong> pesan chat, form, dan preferensi layanan.</li>
          </ul>

          <h5 class="mt-3">Bagaimana Kami Menggunakannya</h5>
          <ul class="policy-list">
            <li>Menyediakan layanan konsultasi dan pemesanan produk.</li>
            <li>Mengirim notifikasi terkait pesanan dan update layanan.</li>
            <li>Meningkatkan fitur dan keamanan platform kami.</li>
          </ul>

          <h5 class="mt-3">Keamanan & Hak Anda</h5>
          <p class="text-muted">Kami menerapkan langkah teknis dan organisasi untuk melindungi data. Anda berhak meminta akses, koreksi, atau penghapusan data melalui kontak layanan kami.</p>

          <p class="text-muted small mt-4">Catatan: Ini adalah template awal. Sesuaikan konten ini dengan kebijakan hukum dan praktik perusahaan.</p>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="policy-card">
          <h5 style="font-weight:700">Kontak Privacy</h5>
          <p class="mb-1">Butuh bantuan terkait data pribadi?</p>
          <p><a href="{{ url('/kontak') }}" class="btn btn-outline-primary btn-sm">Hubungi Kami</a></p>

          <hr>
          <h6 style="font-weight:700">Pembaruan Kebijakan</h6>
          <p class="small text-muted">Kebijakan dapat diperbarui. Tanggal terakhir pembaruan: <strong>2026-02-13</strong>.</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
