@extends('layouts.app')

@section('title', 'Kesehatan Mental | RuangKonsul')

@section('meta_description', 'RuangKonsul - Konsultasi kesehatan online profesional')

@section('content')

<section class="rk-hero-detail">
  <div class="rk-container">
    <h1>Kesehatan Mental</h1>
    <p>Pendampingan profesional untuk menjaga keseimbangan emosional dan kualitas hidup Anda.</p>
  </div>
</section>

<!-- ================= CONTENT ================= -->
<section class="rk-content">
  <div class="rk-container">
    <div class="rk-content-grid">

      <!-- ARTIKEL -->
      <div class="rk-article">
        <h2>Apa itu Kesehatan Mental?</h2>
        <p>
          Kesehatan mental adalah kondisi di mana seseorang mampu mengelola emosi, berpikir secara positif,
          menghadapi tekanan hidup, serta menjalani aktivitas sehari-hari secara produktif.
        </p>

        <p>
          Di RuangKonsul, kami memahami bahwa setiap individu memiliki tantangan yang berbeda. Oleh karena itu,
          layanan kesehatan mental kami dirancang secara personal, aman, dan rahasia.
        </p>

        <h3>Masalah yang Dapat Ditangani</h3>
        <ul>
          <li>Stres berlebihan & burnout</li>
          <li>Kecemasan dan overthinking</li>
          <li>Depresi ringan hingga sedang</li>
          <li>Masalah kepercayaan diri</li>
          <li>Kesulitan mengelola emosi</li>
        </ul>

        <h3>Kenapa Konsultasi di RuangKonsul?</h3>
        <p>
          Konsultasi dilakukan oleh tenaga profesional berpengalaman dengan pendekatan empati,
          berbasis solusi, dan berorientasi pada pemulihan jangka panjang.
        </p>
      </div>

      <!-- VIDEO -->
      <div class="rk-video-box">
        <h2>Video Edukasi</h2>
        <div class="rk-video-wrapper">
          <iframe
            src="https://www.youtube.com/embed/oxx564hMBUI"
            title="Edukasi Kesehatan Mental"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
          </iframe>
        </div>

        <p class="video-desc">
          Video ini menjelaskan pentingnya menjaga kesehatan mental serta kapan waktu yang tepat
          untuk berkonsultasi dengan profesional.
        </p>
      </div>

    </div>
  </div>
</section>
@endsection