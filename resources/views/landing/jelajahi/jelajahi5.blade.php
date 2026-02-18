@extends('layouts.app')

@section('title', 'Penyakit Kronis | RuangKonsul')

@section('meta_description', 'RuangKonsul - Konsultasi kesehatan online profesional')

@section('content')
<section class="rk-hero-detail">
  <div class="rk-container">
    <h1>Penyakit Kronis</h1>
    <p>Pendampingan untuk meningkatkan kualitas hidup dengan kondisi kronis.</p>
  </div>
</section>

<section class="rk-content">
  <div class="rk-container">
    <div class="rk-content-grid">

      <div class="rk-article">
        <h2>Apa itu Penyakit Kronis?</h2>
        <p>
          Penyakit kronis adalah kondisi kesehatan jangka panjang yang memerlukan
          pengelolaan berkelanjutan.
        </p>

        <h3>Area Pendampingan</h3>
        <ul>
          <li>Manajemen nyeri</li>
          <li>Dukungan emosional</li>
          <li>Kepatuhan terapi</li>
          <li>Gaya hidup pendukung</li>
          <li>Motivasi & kualitas hidup</li>
        </ul>

        <h3>Pendekatan Kami</h3>
        <p>
          Kolaboratif, empatik, dan berfokus pada kenyamanan pasien.
        </p>
      </div>

      <div class="rk-video-box">
        <h2>Video Edukasi</h2>
        <div class="rk-video-wrapper">
          <iframe src="https://www.youtube.com/embed/ppuepIn2-QI" allowfullscreen></iframe>
        </div>
        <p class="video-desc">Mengelola penyakit kronis secara holistik.</p>
      </div>

    </div>
  </div>
</section>
@endsection