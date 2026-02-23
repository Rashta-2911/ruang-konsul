@extends('layouts.app')

@section('title','Syarat & Ketentuan | RuangKonsul')
@section('meta_description','Syarat dan Ketentuan Penggunaan RuangKonsul')

@section('content')

@push('styles')
<style>

.page-hero-terms{
    background: linear-gradient(135deg,#1e88e5,#1565c0);
    padding:80px 20px;
    border-radius:25px;
    position:relative;
    overflow:hidden;
    text-align:center;
    margin-bottom:0;
}

.page-hero-terms::before{
    content:'';
    position:absolute;
    width:350px;
    height:350px;
    background:rgba(255,255,255,0.07);
    border-radius:50%;
    top:-100px;
    right:-100px;
}

.page-hero-terms::after{
    content:'';
    position:absolute;
    width:250px;
    height:250px;
    background:rgba(255,255,255,0.05);
    border-radius:50%;
    bottom:-80px;
    left:-80px;
}

.page-hero-terms h1{
    color:#fff;
    font-weight:800;
    font-size:42px;
}

.page-hero-terms p{
    color:#e3f2fd;
    font-size:17px;
    margin-top:10px;
}

.terms-wrapper{
    margin-top:-60px;
    position:relative;
    z-index:10;
}

.terms-card{
    background:#ffffff;
    border-radius:20px;
    padding:40px;
    box-shadow:0 10px 50px rgba(21,101,192,0.08);
}

.terms-card h4{
    font-weight:700;
    color:#1565c0;
    margin-bottom:25px;
}

.terms-ol{
    counter-reset:item;
    padding-left:0;
}

.terms-ol li{
    list-style:none;
    margin-bottom:20px;
    padding-left:60px;
    position:relative;
    font-size:15px;
    color:#455a64;
}

.terms-ol li strong{
    color:#0d47a1;
}

.terms-ol li::before{
    content:counter(item);
    counter-increment:item;
    position:absolute;
    left:0;
    top:0;
    width:40px;
    height:40px;
    background:#1565c0;
    color:#fff;
    border-radius:50%;
    text-align:center;
    line-height:40px;
    font-weight:700;
    box-shadow:0 4px 15px rgba(21,101,192,0.3);
}

.terms-footer{
    background:#e3f2fd;
    padding:18px;
    border-radius:10px;
    margin-top:25px;
    font-size:13px;
}

@media(max-width:768px){
    .page-hero-terms h1{
        font-size:30px;
    }

    .terms-card{
        padding:25px;
    }

    .terms-ol li{
        padding-left:50px;
    }
}

</style>
@endpush


<section class="py-5">
  <div class="container">

    <div class="page-hero-terms">
        <h1>Syarat & Ketentuan</h1>
        <p>Harap membaca syarat penggunaan sebelum menggunakan layanan RuangKonsul</p>
    </div>

    <div class="terms-wrapper">
        <div class="terms-card">

            <h4>Ringkasan Ketentuan Penggunaan</h4>

            <ol class="terms-ol">

                <li>
                    <strong>Umur & Kelayakan:</strong>
                    Pengguna minimal berusia 18 tahun atau telah mendapatkan izin dari wali sah untuk menggunakan layanan konsultasi kesehatan online.
                </li>

                <li>
                    <strong>Penggunaan Layanan:</strong>
                    Pengguna wajib memberikan informasi yang benar, lengkap dan tidak melakukan penyalahgunaan terhadap fitur konsultasi maupun sistem RuangKonsul.
                </li>

                <li>
                    <strong>Pembayaran:</strong>
                    Seluruh transaksi layanan konsultasi dilakukan melalui sistem pembayaran yang tersedia dan tunduk pada ketentuan checkout.
                </li>

                <li>
                    <strong>Pengembalian & Penggantian:</strong>
                    Ketentuan refund atau penggantian layanan mengikuti kebijakan masing-masing produk atau layanan kesehatan yang tersedia.
                </li>

                <li>
                    <strong>Perubahan Ketentuan:</strong>
                    RuangKonsul berhak melakukan perubahan terhadap syarat penggunaan sewaktu-waktu dan akan diumumkan melalui halaman ini.
                </li>

            </ol>

            <div class="terms-footer">
                Dokumen ini merupakan template syarat penggunaan layanan RuangKonsul. Untuk penggunaan resmi disarankan berkonsultasi dengan pihak hukum terkait.
            </div>

        </div>
    </div>

  </div>
</section>

@endsection
