@extends('layouts.app')

@section('title', 'Appointment | RuangKonsul')
@section('meta_description', 'RuangKonsul - Konsultasi kesehatan online profesional')

@section('content')
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <h1 class="text-capitalize mb-5 text-lg text-white">Appointment</h1>
      </div>
    </div>
  </div>
</section>

<section class="appoinment section">
  <div class="container">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
          <h2 class="mb-2 title-color">Book an Appointment</h2>
          @if(auth()->guard('customer')->check())
            <form class="appoinment-form" method="POST" action="{{ route('appointment.store') }}">
              @csrf
              <div class="row">
                <div class="col-lg-6 mb-3">
                  <input name="customerId" type="text" class="form-control" placeholder="Customer ID" value="{{ auth()->guard('customer')->user()->customerId }}" readonly>
                </div>
                <div class="col-lg-6 mb-3">
                  <select name="dokterId" class="form-control">
                    <option value="">Pilih Dokter</option>
                    @foreach($dokters as $dokter)
                      <option value="{{ $dokter->dokterId }}">{{ $dokter->dokterName }} @if(!empty($dokter->namaBidang)) - {{ $dokter->namaBidang }}@endif</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-lg-6 mb-3">
                  <input name="date" type="date" class="form-control">
                </div>
                <div class="col-lg-6 mb-3">
                  <input name="time" type="time" class="form-control">
                </div>
                <div class="col-lg-12 mb-3">
                  <textarea name="pesan" class="form-control" rows="4" placeholder="Pesan"></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-main btn-round-full">Make Appointment</button>
            </form>
          @else
            <div class="alert alert-info">Silakan <a href="{{ route('login') }}">login</a> terlebih dahulu untuk membuat appointment.</div>

            <form class="appoinment-form">
              <div class="row">
                <div class="col-lg-6 mb-3">
                  <input disabled type="text" class="form-control" placeholder="Customer ID">
                </div>
                <div class="col-lg-6 mb-3">
                  <select disabled class="form-control">
                    <option>Pilih Dokter</option>
                    @foreach($dokters as $dokter)
                      <option>{{ $dokter->dokterName }} @if(!empty($dokter->namaBidang)) - {{ $dokter->namaBidang }}@endif</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-lg-6 mb-3">
                  <input disabled type="date" class="form-control">
                </div>
                <div class="col-lg-6 mb-3">
                  <input disabled type="time" class="form-control">
                </div>
                <div class="col-lg-12 mb-3">
                  <textarea disabled class="form-control" rows="4" placeholder="Pesan"></textarea>
                </div>
              </div>
              <button disabled class="btn btn-main btn-round-full">Make Appointment</button>
            </form>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
