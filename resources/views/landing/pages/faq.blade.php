@extends('layouts.app')

@section('title','FAQ | RuangKonsul')
@section('meta_description','Pertanyaan yang sering diajukan (FAQ)')

@section('content')
@push('styles')
<style>
  .page-hero-faq{background:linear-gradient(135deg,#223a66,#2b4c7e);color:#fff;padding:42px 0;border-radius:12px;margin-bottom:22px}
  .faq-card{border-radius:10px;box-shadow:0 10px 30px rgba(34,58,102,0.06);padding:18px;background:white;color:#223a66}
</style>
@endpush

<section class="py-5">
  <div class="container">
    <div class="page-hero-faq text-center">
      <h1 style="font-weight:800;">FAQ</h1>
      <p style="opacity:.95;margin-top:6px;">Pertanyaan yang sering diajukan seputar layanan dan pemesanan.</p>
    </div>

    <div class="row">
      <div class="col-lg-8">
        <div class="faq-card">
          <div id="faqAccordion" role="tablist">
            <div class="card mb-2">
              <div class="card-header" role="tab" id="q1">
                <h5 class="mb-0">
                  <a data-toggle="collapse" href="#a1" aria-expanded="true" aria-controls="a1" style="display:block;color:#223a66;">Bagaimana cara membuat janji konsultasi?</a>
                </h5>
              </div>
              <div id="a1" class="collapse show" role="tabpanel" aria-labelledby="q1" data-parent="#faqAccordion">
                <div class="card-body text-muted">Klik menu "Appointment", isi formulir, lalu tim kami akan menghubungi Anda untuk konfirmasi jadwal.</div>
              </div>
            </div>

            <div class="card mb-2">
              <div class="card-header" role="tab" id="q2">
                <h5 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" href="#a2" aria-expanded="false" aria-controls="a2" style="display:block;color:#223a66;">Apakah konsultasi berbayar?</a>
                </h5>
              </div>
              <div id="a2" class="collapse" role="tabpanel" aria-labelledby="q2" data-parent="#faqAccordion">
                <div class="card-body text-muted">Beberapa layanan konsultasi mungkin berbayar. Informasi harga ditampilkan pada halaman konfirmasi sebelum pembayaran.</div>
              </div>
            </div>

            <div class="card mb-2">
              <div class="card-header" role="tab" id="q3">
                <h5 class="mb-0">
                  <a class="collapsed" data-toggle="collapse" href="#a3" aria-expanded="false" aria-controls="a3" style="display:block;color:#223a66;">Bagaimana cara mengembalikan produk?</a>
                </h5>
              </div>
              <div id="a3" class="collapse" role="tabpanel" aria-labelledby="q3" data-parent="#faqAccordion">
                <div class="card-body text-muted">Hubungi layanan pelanggan melalui halaman Kontak untuk prosedur pengembalian sesuai syarat produk.</div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="faq-card">
          <h5 style="font-weight:700">Masih butuh bantuan?</h5>
          <p class="small text-muted">Jika pertanyaan Anda tidak terjawab, silakan hubungi tim kami.</p>
          <a href="{{ url('/kontak') }}" class="btn btn-primary btn-block">Hubungi Kami</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
