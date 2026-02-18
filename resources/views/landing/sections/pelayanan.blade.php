@extends('layouts.app')

@section('title', 'Pelayanan | RuangKonsul')

@section('meta_description', 'RuangKonsul - Konsultasi kesehatan online profesional')

@section('content')

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Our services</span>
          <h1 class="text-capitalize mb-5 text-lg">What We Do</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our services</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section service bg-gray">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2>Pelayanan</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Kami menyediakan berbagai layanan konsultasi yang dirancang untuk membantu Anda memahami permasalahan secara menyeluruh dan menemukan solusi yang tepat dengan pendampingan tenaga profesional.</p>
				</div>
			</div>
		</div>

	<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-6">
		<div class="service-item mb-4">
			<div class="icon d-flex align-items-center">
				<i class="icofont-brain-alt text-lg"></i>
				<h4 class="mt-3 mb-3">Kesehatan Mental</h4>
			</div>
			<div class="content">
				<p class="mb-4">
					Layanan konsultasi profesional untuk membantu mengelola stres, kecemasan, dan kesehatan mental secara aman, rahasia, dan berkelanjutan.
				</p>
			</div>
		</div>
	</div>

	<!-- Kesehatan Seksual -->
	<div class="col-lg-4 col-md-6 col-sm-6">
		<div class="service-item mb-4">
			<div class="icon d-flex align-items-center">
				<i class="icofont-heart-beat text-lg"></i>
				<h4 class="mt-3 mb-3">Kesehatan Seksual</h4>
			</div>
			<div class="content">
				<p class="mb-4">
					Konsultasi privat dan terpercaya untuk menjaga kesehatan seksual serta menangani permasalahan dengan pendekatan profesional.
				</p>
			</div>
		</div>
	</div>
	
	<!-- Parenting -->
	<div class="col-lg-4 col-md-6 col-sm-6">
		<div class="service-item mb-4">
			<div class="icon d-flex align-items-center">
				<i class="icofont-baby text-lg"></i>
				<h4 class="mt-3 mb-3">Parenting</h4>
			</div>
			<div class="content">
				<p class="mb-4">
					Pendampingan dan konsultasi bagi orang tua untuk mendukung tumbuh kembang anak secara sehat, optimal, dan penuh kesadaran.
				</p>
			</div>
		</div>
	</div>

	<!-- Gaya Hidup Sehat -->
	<div class="col-lg-4 col-md-6 col-sm-6">
		<div class="service-item mb-4">
			<div class="icon d-flex align-items-center">
				<i class="icofont-heart-beat-alt text-lg"></i>
				<h4 class="mt-3 mb-3">Gaya Hidup Sehat</h4>
			</div>
			<div class="content">
				<p class="mb-4">
					Panduan dan konsultasi untuk membangun pola hidup sehat, seimbang, serta kebiasaan positif yang berkelanjutan.
				</p>
			</div>
		</div>
	</div>

	<!-- Penyakit Kronis -->
	<div class="col-lg-4 col-md-6 col-sm-6">
		<div class="service-item mb-4">
			<div class="icon d-flex align-items-center">
				<i class="icofont-medical-sign-alt text-lg"></i>
				<h4 class="mt-3 mb-3">Penyakit Kronis</h4>
			</div>
			<div class="content">
				<p class="mb-4">
					Pendampingan dan konsultasi berkelanjutan untuk membantu pengelolaan penyakit kronis secara tepat dan terarah.
				</p>
			</div>
		</div>
	</div>
	
	<!-- Gizi / Nutrisi -->
	<div class="col-lg-4 col-md-6 col-sm-6">
		<div class="service-item mb-4">
			<div class="icon d-flex align-items-center">
				<i class="icofont-apple text-lg"></i>
				<h4 class="mt-3 mb-3">Gizi / Nutrisi</h4>
			</div>
			<div class="content">
				<p class="mb-4">
					Konsultasi gizi dan nutrisi untuk membantu memenuhi kebutuhan tubuh serta menjaga kesehatan jangka panjang.
				</p>
			</div>
		</div>
	</div>
</div>

				</div>
			</div>
		</div>
	</div>
</section>

@endsection