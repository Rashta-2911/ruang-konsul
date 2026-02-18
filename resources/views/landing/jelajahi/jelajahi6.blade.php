@extends('layouts.app')

@section('title', 'Gizi dan Nutrisi | RuangKonsul')

@section('meta_description', 'RuangKonsul - Konsultasi kesehatan online profesional')

@section('content')

<section class="rk-hero-detail">
  <div class="rk-container">
    <h1>Gizi & Nutrisi</h1>
    <p>Panduan nutrisi seimbang sesuai kebutuhan tubuh Anda.</p>
  </div>
</section>

<section class="rk-content">
  <div class="rk-container">
    <div class="rk-content-grid">

      <div class="rk-article">
        <h2>Mengapa Gizi Penting?</h2>
        <p>
          Asupan nutrisi yang tepat membantu menjaga energi, imun, dan kesehatan jangka panjang.
        </p>

        <h3>Topik Konsultasi</h3>
        <ul>
          <li>Pola makan seimbang</li>
          <li>Diet khusus</li>
          <li>Masalah berat badan</li>
          <li>Gizi anak & dewasa</li>
          <li>Perencanaan menu</li>
        </ul>

        <h3>Keunggulan Kami</h3>
        <p>
          Rekomendasi personal, praktis, dan berbasis kebutuhan individu.
        </p>
      </div>

      <div class="rk-video-box">
        <h2>Video Edukasi</h2>
        <div class="rk-video-wrapper">
          <iframe src="https://www.youtube.com/embed/z88lgOdF0-M" allowfullscreen></iframe>
        </div>
        <p class="video-desc">Dasar gizi seimbang untuk hidup sehat.</p>
      </div>

    </div>
  </div>
</section>
@endsection