@extends('layouts.app')

@section('title', $kategori->kategoriName . ' | RuangKonsul')
@section('meta_description', 'RuangKonsul - ' . $kategori->kategoriName)

@section('content')

<section class="detail-page-header">
  <div class="container">
    <h1>{{ $kategori->kategoriName }}</h1>
    <span class="badge bg-primary">
      {{ $produks->count() }} Produk Tersedia
    </span>
  </div>
</section>


<section class="py-5">
<div class="container">

@if($produks->count()>0)
<div class="row">

@foreach($produks as $produk)
<div class="col-lg-4 col-md-6 mb-4">

<div class="detail-product-card">

<div class="detail-product-image">
@if($produk->gambar)
<img src="{{ asset($produk->gambar) }}">
@endif

@if($produk->qty==0)
<span class="detail-badge-stock detail-out-of-stock">Stok Habis</span>
@elseif($produk->qty<10)
<span class="detail-badge-stock detail-low-stock">Stok Terbatas</span>
@else
<span class="detail-badge-stock detail-in-stock">Tersedia</span>
@endif
</div>

<div class="detail-product-body">

<h4 class="detail-product-name">{{ $produk->produkName }}</h4>

<div class="detail-price-section">
<div class="detail-price-value">
  Rp {{ number_format($produk->price ?? 0,0,',','.') }}
</div>
<div class="detail-stock-info">
  📦 Stok Tersedia: <strong>{{ $produk->qty }} unit</strong>
</div>
</div>

@if($produk->qty>0)
<div class="detail-product-buttons">
<button type="button"
        class="detail-btn-cart-outline add-to-cart-btn"
        data-id="{{ $produk->produkId }}">
    <i class="icofont-cart-alt"></i> Add To Cart
</button>

<button type="button" 
        class="detail-btn-buy-now buy-now-btn"
        data-id="{{ $produk->produkId }}"
        data-name="{{ $produk->produkName }}">
    <i class="icofont-check"></i> Buy Now
</button>
</div>
@else
<button class="btn btn-secondary w-100" disabled>Stok Habis</button>
@endif

</div>
</div>

</div>
@endforeach

</div>
@else
<p>Tidak ada produk.</p>
@endif
    
    <!-- Quick link to cart page -->
    <div class="container mt-5">
      <a href="{{ route('cart.index') }}" class="btn btn-outline-primary" style="border-radius: 10px; padding: 12px 32px; font-weight: 700; border: 2px solid #223a66; color: #223a66;">
        <i class="icofont-cart-alt"></i> Lihat Keranjang Belanja
      </a>
    </div>

</div>
</section>

<!-- Modal untuk pilih quantity saat Buy Now -->
<div class="modal fade" id="buyNowModal" tabindex="-1" aria-labelledby="buyNowModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border: none; border-radius: 16px; box-shadow: 0 15px 50px rgba(34, 58, 102, 0.25);">
      <div class="modal-header" style="background: linear-gradient(135deg, #223a66 0%, #1565c0 100%); border: none;">
        <h5 class="modal-title" id="buyNowModalLabel" style="color: white; font-weight: 700;">🛒 Pembelian Cepat</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="padding: 30px;">
        <div class="mb-4">
          <label for="productNameDisplay" class="form-label" style="font-weight: 600; color: #223a66;">Nama Produk:</label>
          <input type="text" class="form-control" id="productNameDisplay" readonly style="background: #f5f7fa; border: 1px solid #e5e7eb; border-radius: 8px; padding: 12px; color: #6F8BA4;">
        </div>
        <div class="mb-4">
          <label for="quantityInput" class="form-label" style="font-weight: 600; color: #223a66/">Jumlah Pembelian:</label>
          <div style="display: flex; align-items: center; gap: 10px;">
            <button type="button" id="decreaseQty" style="width: 40px; height: 40px; border: 1px solid #e5e7eb; background: white; border-radius: 8px; cursor: pointer; font-weight: 700; color: #223a66;">−</button>
            <input type="number" class="form-control" id="quantityInput" min="1" value="1" required style="text-align: center; border-radius: 8px; font-weight: 700; font-size: 16px;">
            <button type="button" id="increaseQty" style="width: 40px; height: 40px; border: 1px solid #e5e7eb; background: white; border-radius: 8px; cursor: pointer; font-weight: 700; color: #223a66;">+</button>
          </div>
        </div>
      </div>
      <div class="modal-footer" style="border-top: 1px solid #e5e7eb; padding: 20px;">
        <button type="button" class="btn" data-dismiss="modal" style="background: #e5e7eb; color: #6F8BA4; font-weight: 600; border-radius: 8px; padding: 10px 24px;">Batal</button>
        <button type="button" class="btn" id="confirmBuyNowBtn" style="background: linear-gradient(135deg, #e12454 0%, #c01e47 100%); color: white; font-weight: 700; border-radius: 8px; padding: 10px 32px;">Lanjut Checkout</button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function(){
    // Handle Add to Cart
    document.querySelectorAll('.add-to-cart-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const produkId = this.dataset.id;
            const qty = 1;

            fetch('{{ route("cart.add") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    produk_id: produkId,
                    qty: qty
                })
            })
            .then(r => r.json())
            .then(js => {
                if(js.success) {
                    alert('Produk berhasil ditambahkan ke keranjang!');
                } else {
                    alert('Error: ' + (js.error || 'Gagal menambahkan ke keranjang'));
                }
            })
            .catch(err => {
                console.error('Error:', err);
                alert('Gagal menambahkan ke keranjang');
            });
        });
    });

    // Handle Buy Now (Bootstrap 4: use jQuery modal)
    let selectedProductId = null;

    document.querySelectorAll('.buy-now-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        selectedProductId = this.dataset.id;
        const productName = this.dataset.name;
            
        document.getElementById('productNameDisplay').value = productName;
        document.getElementById('quantityInput').value = 1;
        $('#buyNowModal').modal('show');
      });
    });

    // Quantity increase/decrease buttons
    const quantityInput = document.getElementById('quantityInput');
    const increaseBtn = document.getElementById('increaseQty');
    const decreaseBtn = document.getElementById('decreaseQty');

    if(increaseBtn) {
        increaseBtn.addEventListener('click', function(e) {
            e.preventDefault();
            quantityInput.value = parseInt(quantityInput.value) + 1;
        });
    }

    if(decreaseBtn) {
        decreaseBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const currentVal = parseInt(quantityInput.value);
            if(currentVal > 1) {
                quantityInput.value = currentVal - 1;
            }
        });
    }

    // Confirm Buy Now
    document.getElementById('confirmBuyNowBtn').addEventListener('click', function() {
        const qty = parseInt(document.getElementById('quantityInput').value);
        
        if(qty < 1) {
            alert('Jumlah harus minimal 1');
            return;
        }

        // Add to cart
        fetch('{{ route("cart.add") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                produk_id: selectedProductId,
                qty: qty
            })
        })
        .then(r => r.json())
        .then(js => {
            if(js.success) {
            $('#buyNowModal').modal('hide');
            // Redirect ke checkout
            window.location.href = '{{ route("checkout") }}';
          } else {
                alert('Error: ' + (js.error || 'Gagal menambahkan ke keranjang'));
            }
        })
        .catch(err => {
            console.error('Error:', err);
            alert('Gagal menambahkan ke keranjang');
        });
    });
});
</script>
@endpush

@endsection
