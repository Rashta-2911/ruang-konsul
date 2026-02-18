@extends('layouts.app')

@section('title', 'Edit Profile | RuangKonsul')

@section('content')
<section class="section py-5" style="background: #f4f6fa;">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow-sm border-0">
          <div class="card-header" style="background:#223a66;color:white;">
            <h4 class="mb-0">Edit Profil</h4>
          </div>
          <div class="card-body p-4">

            @if($errors->any())
              <div class="alert alert-danger">
                <ul class="mb-0">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="row gx-3">
                <div class="col-md-4 text-center">
                  <img src="{{ $customer->avatar ? asset($customer->avatar) : asset('images/Profile/default-avatar.png') }}" alt="Avatar" class="rounded-circle mb-3" style="width:120px;height:120px;border:4px solid rgba(34,58,102,0.08);">
                  <p class="text-muted small">Avatar saat ini</p>
                  <div class="mb-3">
                    <label class="form-label">Ubah Avatar</label>
                    <input type="file" name="avatar" class="form-control" accept="image/*">
                    <small class="form-text text-muted">Max 2MB (JPEG, PNG, JPG, GIF)</small>
                  </div>
                </div>
                <div class="col-md-8">

                  <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input name="name" value="{{ old('name', $customer->customerName) }}" class="form-control form-control-lg" />
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" value="{{ old('email', $customer->customerEmail) }}" class="form-control form-control-lg" />
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label class="form-label">No. Telp</label>
                      <input name="phone" value="{{ old('phone', $customer->customerNoTelp) }}" class="form-control" />
                    </div>
                    <div class="col-md-6 mb-3">
                      <label class="form-label">Jenis Kelamin</label>
                      <select name="gender" class="form-control">
                        <option value="">Pilih</option>
                        <option value="Laki-laki" {{ old('gender', $customer->customerJenisKelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('gender', $customer->customerJenisKelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="address" class="form-control" rows="2">{{ old('address', $customer->alamat) }}</textarea>
                  </div>

                </div>
              </div>

              <hr>

              <h6>Ganti Password (opsional)</h6>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label class="form-label">Password Baru</label>
                  <input name="password" type="password" class="form-control" />
                </div>
                <div class="col-md-6 mb-3">
                  <label class="form-label">Konfirmasi Password</label>
                  <input name="password_confirmation" type="password" class="form-control" />
                </div>
              </div>

              <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('landing.customer.profile') }}" class="btn btn-outline-secondary me-2">Batal</a>
                <button class="btn btn-main" style="background:#223a66;color:#fff;">Simpan Perubahan</button>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
