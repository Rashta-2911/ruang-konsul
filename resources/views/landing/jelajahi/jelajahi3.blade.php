@extends('layouts.app')

@section('title', 'Parenting | RuangKonsul')

@section('meta_description', 'RuangKonsul - Konsultasi kesehatan online profesional')

@section('content')
<section class="rk-hero-detail">
  <div class="rk-container">
    <h1>Parenting</h1>
    <p>Pendampingan orang tua untuk membangun pola asuh sehat dan harmonis.</p>
  </div>
</section>

<section class="rk-content">
  <div class="rk-container">
    <div class="rk-content-grid">

      <div class="rk-article">
        <h2>Apa itu Parenting?</h2>
        <p>
          Parenting adalah proses mendampingi tumbuh kembang anak secara fisik,
          emosional, dan sosial melalui pola asuh yang tepat.
        </p>

        <h3>Topik Konsultasi</h3>
        <ul>
          <li>Perilaku anak & tantrum</li>
          <li>Komunikasi orang tua–anak</li>
          <li>Pola disiplin positif</li>
          <li>Masalah remaja</li>
          <li>Stres orang tua</li>
        </ul>

        <h3>Kenapa RuangKonsul?</h3>
        <p>
          Pendekatan praktis, empatik, dan berbasis psikologi perkembangan anak.
        </p>
      </div>

      <div class="rk-video-box">
        <h2>Video Edukasi</h2>
        <div class="rk-video-wrapper">
          <iframe src="https://www.youtube.com/embed/L39tafd-kgo" allowfullscreen></iframe>
        </div>
        <p class="video-desc">Tips parenting untuk membangun hubungan sehat dengan anak.</p>
      </div>

    </div>
  </div>
</section>
@endsection