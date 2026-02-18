@extends('layouts.app')

@section('title', 'Beranda | RuangKonsul')

@section('meta_description', 'RuangKonsul - Konsultasi kesehatan online profesional')

@section('content')
	
<!-- Slider Start -->
<section class="banner">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
				<div class="block">
					<div class="divider mb-3"></div>
					<span class="text-uppercase text-sm letter-spacing ">Health care solution</span>
					<h1 class="mb-3 mt-3">Solusi Praktis untuk Kesehatan</h1>
					
					<p class="mb-4 pr-5">Solusi konsultasi kesehatan yang praktis, profesional, dan aman untuk mendukung keputusan terbaik bagi kesehatan Anda.</p>
					<div class="btn-container ">
						<a href="appoinment.html" target="_blank" class="btn btn-main-2 btn-icon btn-round-full">Buat Janji Layanan<i class="icofont-simple-right ml-2  "></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section about gray-bg">
	<div class="container">
		<div class="row align-items-center">
			
			<!-- KIRI -->
			<div class="col-lg-6">
				<div class="section-title">
					<h2>Tentang RuangKonsul</h2>
					<div class="divider my-4"></div>

					<p class="mb-4">
						RuangKonsul adalah platform konsultasi kesehatan yang membantu Anda
						mendapatkan pendampingan profesional secara praktis, aman, dan terpercaya.
					</p>

					<p class="mb-4">
						Kami hadir untuk memberikan ruang yang nyaman bagi setiap individu
						dalam memahami permasalahan kesehatan dan menemukan solusi terbaik
						dengan dukungan tenaga ahli berpengalaman.
					</p>

					<ul class="list-unstyled about-list">
						<li>
							<i class="icofont-check-circled text-color mr-2"></i>
							Privasi terjamin & aman
						</li>
						<li>
							<i class="icofont-check-circled text-color mr-2"></i>
							Ditangani tenaga profesional
						</li>
						<li>
							<i class="icofont-check-circled text-color mr-2"></i>
							Akses fleksibel & mudah
						</li>
					</ul>

					<a href="about.html" class="btn btn-main btn-round-full mt-3">
						Pelajari Lebih Lanjut
					</a>
				</div>
			</div>

			<!-- KANAN -->
			<div class="col-lg-6 mt-4 mt-lg-0">
				<img src="images/about/img-2.jpg" class="img-fluid rounded shadow" alt="Tentang RuangKonsul">
			</div>

		</div>
	</div>
</section>

<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					
					<div class="feature-item mb-5 mb-lg-0">
					<div class="feature-icon mb-4">
						<i class="icofont-heartbeat"></i>
					</div>

					<span>Produk Kesehatan Terpadu</span>

					<h4 class="mb-3">Alat dan Produk Kesehatan</h4>

					<p class="mb-4">
						RuangKonsul menyediakan berbagai produk kesehatan mencakup
						kesehatan mental, kesehatan seksual, parenting, gaya hidup sehat,
						pengelolaan penyakit kronis, serta gizi dan nutrisi.
					</p>

					<a href="produk.html" class="btn btn-main btn-round-full">
						Jelajahi Layanan
					</a>
					</div>


				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-ui-clock"></i>
						</div>
						<span>Jadwal Operasional</span>
						<h4 class="mb-3">Jam Layanan</h4>
						<ul class="w-hours list-unstyled">
		                    <li class="d-flex justify-content-between">
								Minggu - Rabu : <span>08:00 - 17:00</span>
							</li>
		                    <li class="d-flex justify-content-between">
								Kamis - Jumat : <span>09:00 - 17:00</span>
							</li>
		                    <li class="d-flex justify-content-between">
								Sabtu - Minggu : <span>10:00 - 17:00</span>
							</li>
		                </ul>
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>Layanan Darurat</span>
						<h4 class="mb-3">1-800-700-6200</h4>
						<p>
							Dapatkan dukungan cepat untuk kondisi darurat kapan pun dibutuhkan.
							Tim kami siap membantu dan menghubungkan Anda dengan layanan medis terbaik.
						</p>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>



<section class="cta-section ">
	<div class="container">
		<div class="cta position-relative">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-doctor"></i>
						<span class="h3">58</span>k
						<p>Happy People</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-flag"></i>
						<span class="h3">650</span>+
						<p>Surgery Comepleted</p>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-badge"></i>
						<span class="h3">40</span>+
						<p>Expert Doctors</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-globe"></i>
						<span class="h3">20</span>
						<p>Worldwide Branch</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="section service gray-bg">
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
					<a href="halaman_jelajahi/kesehatan-mental.html">Jelajahi</a>
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
					<a href="halaman_jelajahi/kesehatan-seksual.html">Jelajahi</a>
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
					<a href="halaman_jelajahi/parenting.html">Jelajahi</a>
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
					<a href="halaman_jelajahi/gaya-hidup-sehat.html">Jelajahi</a>
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
					<a href="halaman_jelajahi/penyakit-kronis.html">Jelajahi</a>
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
					<a href="halaman_jelajahi/gizi-nutrisi.html">Jelajahi</a>
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
<section class="section appoinment">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 ">
				<div class="appoinment-content">
					<img src="images/about/Foto dokter.jpeg" alt="" class="img-fluid">
				</div>
			</div>
			<div class="col-lg-6 col-md-10 ">
				<div class="appoinment-wrap mt-5 mt-lg-0">
					<h2 class="mb-2 title-color">Our Doctors</h2>
					<p class="mb-4">Seluruh tenaga kerja kesehatan RuangKonsul sudah memiliki standarisasi untuk menjalankan layanan kesehatan sesuai dengan bidangnya.</p>
					     <form id="#" class="appoinment-form" method="post" action="#">
                    <div class="row">
                         <div class="col-lg-6">
                        </div>
                        <div class="col-lg-6">
                        </div>

                </form>
            </div>
			</div>
		</div>
	</div>
</section>
<section class="section testimonial-2 gray-bg">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>Testimoni Pengguna</h2>
					<div class="divider mx-auto my-4"></div>
					<p>
						Pengalaman nyata dari para pengguna yang telah merasakan manfaat layanan
						konsultasi di RuangKonsul.
					</p>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-12 testimonial-wrap-2">

				<div class="testimonial-block style-2 gray-bg">
					<i class="icofont-quote-right"></i>
					<div class="testimonial-thumb">
						<img src="images/team/testi 1.jpeg" alt="" class="img-fluid">
					</div>
					<div class="client-info">
						<h4>Layanan yang sangat membantu!</h4>
						<span>Andi Pratama</span>
						<p>
							Konsultasi di RuangKonsul sangat praktis dan nyaman.
							Penjelasan yang diberikan jelas dan mudah dipahami.
						</p>
					</div>
				</div>

				<div class="testimonial-block style-2 gray-bg">
					<div class="testimonial-thumb">
						<img src="images/team/testi 2.jpeg" alt="" class="img-fluid">
					</div>
					<div class="client-info">
						<h4>Tenaga profesional & responsif</h4>
						<span>Siti Aisyah</span>
						<p>
							Saya merasa didengarkan dan dibimbing dengan baik.
							Layanannya aman dan menjaga privasi.
						</p>
					</div>
					<i class="icofont-quote-right"></i>
				</div>

				<div class="testimonial-block style-2 gray-bg">
					<div class="testimonial-thumb">
						<img src="images/team/testi 3.jpeg" alt="" class="img-fluid">
					</div>
					<div class="client-info">
						<h4>Sangat direkomendasikan</h4>
						<span>Budi Santoso</span>
						<p>
							RuangKonsul membantu saya memahami kondisi kesehatan
							dengan lebih tenang dan terarah.
						</p>
					</div>
					<i class="icofont-quote-right"></i>
				</div>

				<div class="testimonial-block style-2 gray-bg">
					<div class="testimonial-thumb">
						<img src="images/team/testi 2.jpeg" alt="" class="img-fluid">
					</div>
					<div class="client-info">
						<h4>Pelayanan nyaman & terpercaya</h4>
						<span>Dewi Lestari</span>
						<p class="mt-4">
							Saya merasa lebih percaya diri setelah berkonsultasi.
							Prosesnya mudah dan tidak ribet.
						</p>
					</div>
					<i class="icofont-quote-right"></i>
				</div>

				<div class="testimonial-block style-2 gray-bg">
					<div class="testimonial-thumb">
						<img src="images/team/testi 1.jpeg" alt="" class="img-fluid">
					</div>
					<div class="client-info">
						<h4>Layanan modern & solutif</h4>
						<span>Rizky Maulana</span>
						<p>
							Konsultasi online yang sangat membantu di tengah kesibukan.
							Solusi yang diberikan benar-benar relevan.
						</p>
					</div>
					<i class="icofont-quote-right"></i>
				</div>

			</div>
		</div>
	</div>
</section>
 
<section class="section clients">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7">
				<div class="section-title text-center">
					<h2>Kerja Sama Rumah Sakit</h2>
					<div class="divider mx-auto my-4"></div>
					<p>
						RuangKonsul bekerja sama dengan rumah sakit terpercaya di Indonesia
						untuk menghadirkan layanan kesehatan dan kesehatan mental yang aman,
						profesional, dan terintegrasi.
					</p>
				</div>
			</div>
		</div>

		<div class="row justify-content-center mt-5">
			
			<!-- RS 1 -->
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="partner-card text-center">
					<img src="images/about/RSCM.png" alt="RSUPN Dr. Cipto Mangunkusumo" class="img-fluid partner-logo">
					<h4 class="mt-3">RSUPN Dr. Cipto Mangunkusumo</h4>
					<p class="partner-desc">
						Rumah sakit rujukan nasional yang menyediakan layanan medis dan
						kesehatan mental berbasis standar internasional.
					</p>
					<span class="partner-date">Bekerja sama sejak 2021</span>
				</div>
			</div>

			<!-- RS 2 -->
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="partner-card text-center">
					<img src="images/about/Siloam.svg" alt="Siloam Hospitals" class="img-fluid partner-logo">
					<h4 class="mt-3">Siloam Hospitals Group</h4>
					<p class="partner-desc">
						Jaringan rumah sakit swasta terbesar di Indonesia dengan layanan
						konsultasi medis dan psikologis berbasis teknologi digital.
					</p>
					<span class="partner-date">Bekerja sama sejak 2022</span>
				</div>
			</div>

			<!-- RS 3 -->
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="partner-card text-center">
					<img src="images/about/RS pertamina.png" alt="RS Pertamina Pusat" class="img-fluid partner-logo">
					<h4 class="mt-3">RS Pertamina Pusat</h4>
					<p class="partner-desc">
						Rumah sakit nasional dengan fokus layanan kesehatan terpadu dan
						dukungan kesehatan mental bagi masyarakat luas.
					</p>
					<span class="partner-date">Bekerja sama sejak 2023</span>
				</div>
			</div>

		</div>
	</div>
</section>

    @endsection