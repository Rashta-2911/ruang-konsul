@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h3 class="mb-4 fw-bold">Daftar Dokter</h3>

    <div class="row">
        @foreach($dokter as $d)
        <div class="col-md-4 mb-4">
            <div class="card doctor-card border-0 shadow-sm h-100">
                
                @php
                  $imagePath = file_exists(public_path($d->gambar)) ? asset($d->gambar) : asset('storage/' . $d->gambar);
                @endphp
                <img src="{{ $imagePath }}"
                     class="card-img-top doctor-img">

                <div class="card-body">
                    <h5 class="fw-bold mb-2">{{ $d->dokterName }}</h5>

                    <p class="text-primary mb-2">
                        {{ $d->namaBidang }}
                    </p>

                    <p class="text-muted mb-1">
                        Umur: {{ $d->dokterAge }}
                    </p>

                    <p class="text-muted mb-0">
                        Gender: {{ $d->jenisKelamin }}
                    </p>
                </div>

            </div>
        </div>
        @endforeach
    </div>

</div>

@endsection
