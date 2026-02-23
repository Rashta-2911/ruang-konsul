@extends('layouts.app')

@section('title','Keranjang | RuangKonsul')

@section('content')

<div class="container py-5">
    <h3>Keranjang Belanja</h3>

    @if($cartItems->count() > 0)
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr data-id="{{ $item->id }}">
                            <td style="width:40%;">
                                <div class="d-flex align-items-center">
                                    <div style="width:64px;height:64px;overflow:hidden;">
                                        <img src="{{ asset('storage/' . ($item->produk->gambar ?? '')) }}" style="width:100%;height:100%;object-fit:cover;">
                                    </div>
                                    <div class="ml-3">
                                        <div>{{ $item->produk->produkName ?? '' }}</div>
                                        <small>Kode: {{ $item->produkId }}</small>
                                    </div>
                                </div>
                            </td>
                            <td>Rp {{ number_format($item->produk->price ?? 0,0,',','.') }}</td>
                            <td>
                                <input type="number" min="1" max="{{ $item->produk->qty ?? 0 }}" value="{{ $item->qty }}" class="form-control qty-input" style="width:100px;">
                            </td>
                            <td>Rp {{ number_format(($item->produk->price ?? 0) * $item->qty,0,',','.') }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary btn-update">Update</button>
                                <button class="btn btn-sm btn-danger btn-remove">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  

        <div class="d-flex justify-content-end align-items-center">
            <h5 class="mr-4">Total: Rp {{ number_format($total ?? 0,0,',','.') }}</h5>
            <a href="{{ route('checkout') }}" class="btn btn-success">Checkout</a>
        </div>

    @else
        <p>Keranjang kosong.</p>
        <a href="{{ route('produk.index') }}" class="btn btn-primary">Kembali ke Produk</a>
    @endif

</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){
    document.querySelectorAll('.btn-update').forEach(btn=>{
        btn.addEventListener('click', function(){
            const tr = this.closest('tr');
            const id = tr.dataset.id;
            const qty = tr.querySelector('.qty-input').value;

            fetch(`{{ url('/cart/update') }}/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ qty: qty })
            }).then(r=>r.json()).then(js => {
                if(js.success) location.reload(); else alert('Gagal update');
            }).catch(()=>alert('Gagal update'));
        });
    });

    document.querySelectorAll('.btn-remove').forEach(btn=>{
        btn.addEventListener('click', function(){
            const tr = this.closest('tr');
            const id = tr.dataset.id;

            fetch(`{{ url('/cart/remove') }}/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            }).then(r=>r.json()).then(js=>{
                if(js.success) location.reload(); else alert('Gagal hapus');
            }).catch(()=>alert('Gagal hapus'));
        });
    });
});
</script>
@endpush

@endsection
