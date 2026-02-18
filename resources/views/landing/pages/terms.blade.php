@extends('layouts.app')

@section('title','Syarat & Ketentuan | RuangKonsul')
@section('meta_description','Syarat dan Ketentuan Penggunaan RuangKonsul')

@section('content')
@push('styles')
<style>
  .page-hero-terms{background:linear-gradient(135deg,#223a66,#1565c0);color:#fff;padding:44px 0;border-radius:14px;margin-bottom:20px}
  .terms-card{border-radius:12px;box-shadow:0 10px 30px rgba(34,58,102,0.06);padding:22px;background:white;color:#223a66}
  .terms-ol li{margin-bottom:12px}
</style>
@endpush

<section class="py-5">
  <div class="container">
    <div class="page-hero-terms text-center">
      <h1 style="font-weight:800;">Syarat & Ketentuan</h1>
      <p style="opacity:.95;margin-top:8px;">Harap baca syarat penggunaan sebelum memanfaatkan layanan RuangKonsul.</p>
    </div>

    <div class="terms-card">
      <h4 style="font-weight:700">Ringkasan Ketentuan</h4>
      <ol class="terms-ol mt-3">
        <li><strong>Umur & Kelayakan:</strong> Pengguna minimal 18 tahun atau dengan izin wali.</li>
        <li><strong>Penggunaan Layanan:</strong> Pengguna wajib memberikan informasi yang benar dan tidak menyalahgunakan layanan.</li>
        <li><strong>Pembayaran:</strong> Semua transaksi mengikuti syarat yang tertera pada proses checkout.</li>
        <li><strong>Pengembalian & Penggantian:</strong> Ketentuan pengembalian bergantung pada kebijakan produk.</li>
        <li><strong>Perubahan Ketentuan:</strong> Kami dapat memperbarui syarat; perubahan akan diumumkan pada halaman ini.</li>
      </ol>

      <p class="text-muted small mt-3">Dokumen ini adalah template; harap konsultasikan dengan tim hukum sebelum penggunaan resmi.</p>
    </div>
  </div>
</section>
@endsection
