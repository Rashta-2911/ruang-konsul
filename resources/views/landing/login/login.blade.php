@extends('layouts.auth')

@section('title', 'Login | RuangKonsul')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/auth-tabs.css') }}">
@endpush

@section('content')
<div class="auth-wrapper">
  <div class="auth-card">

    <div class="auth-header">
      <i class="icofont-heart-beat"></i>
      <h2>RuangKonsul</h2>
      <p>Masuk untuk konsultasi kesehatan</p>
    </div>

    {{-- ALERT GLOBAL ERROR --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        {{ $errors->first() }}
      </div>
    @endif

    <div class="auth-tabs">
      <button type="button" class="auth-tab active" onclick="switchTab('login')">Login</button>
      <button type="button" class="auth-tab" onclick="switchTab('register')">Daftar</button>
    </div>

    {{-- ================= LOGIN ================= --}}
    <div id="login-tab" class="tab-content active">
      <form method="POST" action="{{ route('login.post') }}">
        @csrf

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" required>
        </div>

        <button type="submit" class="btn-auth">Login</button>
      </form>
    </div>

    {{-- ================= REGISTER ================= --}}
    <div id="register-tab" class="tab-content">
      <form method="POST" action="{{ route('register.post') }}">
        @csrf

        <div class="form-group">
          <label>Nama Lengkap</label>
          <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
          <label>Nomor Telepon</label>
          <input type="text" name="phone" value="{{ old('phone') }}">
        </div>

        <div class="form-group">
          <label>Alamat</label>
          <textarea name="address" rows="2">{{ old('address') }}</textarea>
        </div>

        <div class="form-group">
          <label>Jenis Kelamin</label>
          <select name="gender">
            <option value="">Pilih</option>
            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
          </select>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" name="password" required>
        </div>

        <div class="form-group">
          <label>Konfirmasi Password</label>
          <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn-auth">Daftar</button>
      </form>
    </div>

  </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/auth-tabs.js') }}"></script>
@endpush
