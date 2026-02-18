@extends('layouts.app')

@section('title', 'Kesehatan seksual | RuangKonsul')

@section('meta_description', 'RuangKonsul - Konsultasi kesehatan online profesional')

@section('content')
<section class="rk-hero-detail">
  <div class="rk-container">
    <h1>Kesehatan Seksual</h1>
    <p>
      Konsultasi aman dan profesional untuk menjaga kesehatan seksual
      serta kualitas hubungan Anda.
    </p>
  </div>
</section>

<!-- ================= CONTENT ================= -->
<section class="rk-content">
  <div class="rk-container">
    <div class="rk-content-grid">

      <!-- ARTIKEL -->
      <div class="rk-article">
        <h2>Apa itu Kesehatan Seksual?</h2>
        <p>
          Kesehatan seksual mencakup kondisi fisik, emosional, mental,
          dan sosial yang berkaitan dengan seksualitas secara positif
          dan bertanggung jawab.
        </p>

        <p>
          Di RuangKonsul, kami menyediakan ruang konsultasi yang aman,
          rahasia, dan bebas stigma bersama tenaga profesional.
        </p>

        <h3>Masalah yang Dapat Dikonsultasikan</h3>
        <ul>
          <li>Gangguan libido</li>
          <li>Masalah performa seksual</li>
          <li>Nyeri saat berhubungan</li>
          <li>Edukasi kesehatan reproduksi</li>
          <li>Masalah komunikasi dengan pasangan</li>
        </ul>

        <h3>Kenapa Memilih RuangKonsul?</h3>
        <p>
          Konsultasi dilakukan secara empatik, berbasis edukasi,
          dan disesuaikan dengan kebutuhan pribadi Anda.
        </p>
      </div>

      <!-- VIDEO -->
      <div class="rk-video-box">
        <h2>Video Edukasi</h2>
        <div class="rk-video-wrapper">
          <iframe
            src="https://www.youtube.com/embed/9jxVKhe2YwE"
            title="Edukasi Kesehatan Seksual"
            allowfullscreen>
          </iframe>
        </div>
        <p class="video-desc">
          Video ini membahas pentingnya edukasi kesehatan seksual
          untuk kehidupan yang sehat dan harmonis.
        </p>
      </div>

    </div>
  </div>
</section>
@endsection