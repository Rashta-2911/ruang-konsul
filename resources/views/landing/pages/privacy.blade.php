@extends('layouts.app')

@section('title','Kebijakan Privasi | RuangKonsul')
@section('meta_description','Kebijakan Privasi RuangKonsul')

@section('content')

@push('styles')
<style>

.page-hero-privacy{
    background: linear-gradient(135deg,#1e88e5,#1565c0);
    padding:80px 20px;
    border-radius:25px;
    position:relative;
    overflow:hidden;
    text-align:center;
}

.page-hero-privacy::before{
    content:'';
    position:absolute;
    width:350px;
    height:350px;
    background:rgba(255,255,255,0.07);
    border-radius:50%;
    top:-100px;
    right:-100px;
}

.page-hero-privacy::after{
    content:'';
    position:absolute;
    width:250px;
    height:250px;
    background:rgba(255,255,255,0.05);
    border-radius:50%;
    bottom:-80px;
    left:-80px;
}

.page-hero-privacy h1{
    color:#fff;
    font-weight:800;
    font-size:42px;
}

.page-hero-privacy p{
    color:#e3f2fd;
    font-size:17px;
    margin-top:10px;
}

.policy-wrapper{
    margin-top:-60px;
    position:relative;
    z-index:10;
}

.policy-card{
    background:#ffffff;
    border-radius:20px;
    padding:35px;
    box-shadow:0 10px 50px rgba(21,101,192,0.08);
    margin-bottom:20px;
}

.policy-card h4,
.policy-card h5,
.policy-card h6{
    color:#1565c0;
    font-weight:700;
}

.policy-list{
    padding-left:0;
    list-style:none;
}

.policy-list li{
    margin-bottom:15px;
    padding-left:35px;
    position:relative;
    font-size:15px;
    color:#455a64;
}

.policy-list li::before{
    content:'✔';
    position:absolute;
    left:0;
    top:0;
    width:22px;
    height:22px;
    background:#1565c0;
    color:#fff;
    border-radius:50%;
    text-align:center;
    line-height:22px;
    font-size:12px;
}

.policy-footer{
    background:#e3f2fd;
    padding:15px;
    border-radius:10px;
    font-size:13px;
    margin-top:20px;
}

.contact-btn{
    border-radius:30px;
    padding:6px 18px;
}

@media(max-width:768px){
    .page-hero-privacy h1{
        font-size:30px;
    }

    .policy-card{
        padding:25px;
    }
}

</style>
@endpush


<section class="py-5">
  <div class="container">

    <div class="page-hero-privacy">
        <h1>Kebijakan Privasi</h1>
        <p>Privasi Anda penting — berikut ringkasan bagaimana kami mengelola data Anda.</p>
    </div>

    <div class="policy-wrapper">
        <div class="row">

            <div class="col-lg-8">
                <div class="policy-card">

                    <h4>Ringkasan</h4>
                    <p class="text-muted">
                        Kami mengumpulkan beberapa informasi dasar untuk menyediakan layanan, memperbaiki pengalaman,
                        dan mengamankan akun Anda.
                    </p>

                    <h5 class="mt-4">Informasi yang Kami Kumpulkan</h5>
                    <ul class="policy-list">
                        <li><strong>Informasi Akun:</strong> nama, email, nomor telepon.</li>
                        <li><strong>Transaksi & Pesanan:</strong> riwayat pembelian dan pengiriman.</li>
                        <li><strong>Interaksi:</strong> pesan chat, form, dan preferensi layanan.</li>
                    </ul>

                    <h5 class="mt-4">Bagaimana Kami Menggunakannya</h5>
                    <ul class="policy-list">
                        <li>Menyediakan layanan konsultasi dan pemesanan produk.</li>
                        <li>Mengirim notifikasi terkait pesanan dan update layanan.</li>
                        <li>Meningkatkan fitur dan keamanan platform kami.</li>
                    </ul>

                    <h5 class="mt-4">Keamanan & Hak Anda</h5>
                    <p class="text-muted">
                        Kami menerapkan langkah teknis dan organisasi untuk melindungi data.
                        Anda berhak meminta akses, koreksi, atau penghapusan data melalui kontak layanan kami.
                    </p>

                    <div class="policy-footer">
                        Catatan: Ini adalah template awal. Sesuaikan konten ini dengan kebijakan hukum dan praktik perusahaan.
                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="policy-card">

                    <h5>Kontak Privacy</h5>
                    <p>Butuh bantuan terkait data pribadi?</p>

                    <a href="{{ url('/kontak') }}" class="btn btn-outline-primary btn-sm contact-btn">
                        Hubungi Kami
                    </a>

                    <hr>

                    <h6>Pembaruan Kebijakan</h6>
                    <p class="small text-muted">
                        Kebijakan dapat diperbarui. <br>
                        Tanggal terakhir pembaruan: <strong>2026-02-13</strong>
                    </p>

                </div>
            </div>

        </div>
    </div>

  </div>
</section>

@endsection
