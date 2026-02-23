@extends('layouts.app')

@section('title', 'Tentang Kami | RuangKonsul')

@section('meta_description', 'RuangKonsul adalah platform konsultasi kesehatan online yang aman, profesional, dan terpercaya')

@section('content')

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Tentang Kami</span>
          <h1 class="text-capitalize mb-5 text-lg">Mengenal RuangKonsul</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section about-page">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4">
				<h2 class="title-color">
					Ruang Aman untuk Konsultasi Kesehatan Anda
				</h2>
			</div>
			<div class="col-lg-8">
				<p>
					<strong>RuangKonsul</strong> adalah platform konsultasi kesehatan online
					yang hadir untuk membantu masyarakat mendapatkan pendampingan medis
					dan kesehatan mental secara <strong>mudah, aman, dan profesional</strong>.
				</p>

				<p>
					Kami memahami bahwa setiap individu memiliki kebutuhan kesehatan yang
					berbeda. Oleh karena itu, RuangKonsul menyediakan ruang konsultasi yang
					nyaman dan menjaga privasi, dengan dukungan tenaga kesehatan berpengalaman
					di berbagai bidang.
				</p>

				<p>
					Dengan memanfaatkan teknologi digital, kami berkomitmen menghadirkan
					layanan kesehatan yang lebih inklusif, fleksibel, dan terpercaya.
				</p>

				<img src="images/about/sign.png" alt="RuangKonsul" class="img-fluid mt-3">
			</div>
		</div>
	</div>
</section>

<section class="fetaure-page">
	<div class="container">
		<div class="row">

			<div class="col-lg-3 col-md-6">
				<div class="about-block-item mb-5 mb-lg-0 text-center">
					<img src="images/about/Tentang dokter.jpeg" alt="" class="img-fluid w-100">
					<h4 class="mt-3">Privasi Terjamin</h4>
					<p>
						Setiap sesi konsultasi dilakukan secara aman dan menjaga kerahasiaan
						data serta kenyamanan pengguna.
					</p>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="about-block-item mb-5 mb-lg-0 text-center">
					<img src="images/about/Tentang dokter 1.jpeg" alt="" class="img-fluid w-100">
					<h4 class="mt-3">Tenaga Profesional</h4>
					<p>
						Ditangani oleh dokter dan tenaga kesehatan yang kompeten sesuai
						bidang keahliannya.
					</p>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="about-block-item mb-5 mb-lg-0 text-center">
					<img src="images/about/Tentang dokter 2.jpeg" alt="" class="img-fluid w-100">
					<h4 class="mt-3">Akses Fleksibel</h4>
					<p>
						Layanan konsultasi dapat diakses kapan saja dan di mana saja
						sesuai kebutuhan Anda.
					</p>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="about-block-item text-center">
					<img src="images/about/Tentang dokter 3.webp " alt="" class="img-fluid w-100">
					<h4 class="mt-3">Pendekatan Humanis</h4>
					<p>
						Kami mengedepankan empati, komunikasi yang jelas, dan solusi yang
						berfokus pada pasien.
					</p>
				</div>
			</div>

		</div>
	</div>
</section>

<section class="section awards">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-4">
				<h2 class="title-color">Komitmen & Kredibilitas</h2>
				<div class="divider mt-4 mb-5 mb-lg-0"></div>
				<p>
					RuangKonsul memiliki kredibilitas dari berbagai pencapaian dan berkomitmen menjaga standar pelayanan kesehatan yang tinggi
					melalui kerja sama dengan berbagai institusi dan tenaga profesional.
				</p>
			</div>

			<div class="col-lg-8">
				<div class="row">
					@for ($i = 1; $i <= 6; $i++)
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="award-img">
								<img src="images/about/{{ $i }}.png" alt="" class="img-fluid">
							</div>
						</div>
					@endfor
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section team">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center">
					<h2 class="mb-4">Tenaga Profesional Kami</h2>
					<div class="divider mx-auto my-4"></div>
					<p>
						Tim RuangKonsul terdiri dari dokter dan tenaga kesehatan berpengalaman
						yang siap mendampingi Anda secara profesional.
					</p>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="team-block mb-5 mb-lg-0">
					<img src="images/team/spesialis 12.png" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-0">Dr. Ferryansyah</h4>
						<p>Psikolog Klinis & Urologi</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="team-block mb-5 mb-lg-0">
					<img src="images/team/spesialis 13.png" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-0">Dr. I Gusti Agung Triana S</h4>
						<p>Spesialis Urologi</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="team-block mb-5 mb-lg-0">
					<img src="images/team/spesialis 14.png" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-0">Dr. Mariska Yanti Tongku</h4>
						<p>Spesialis Anak</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="team-block">
					<img src="images/team/spesialis 15.png" alt="" class="img-fluid w-100">
					<div class="content">
						<h4 class="mt-4 mb-0">Dr. Rafif Naufal Dani</h4>
						<p>Spesialis Anak & Kedokteran Olahraga</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
