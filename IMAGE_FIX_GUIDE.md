# ✅ Panduan Fix Upload Gambar Produk - RuangKonsul

## Masalah yang Ditemukan
- Gambar produk dan dokter tidak muncul di website
- Penyebab: Path gambar tidak benar dalam view Blade

## Solusi yang Telah Diterapkan

### 1. ✅ Fix View Blade Files
Telah diperbaiki path gambar di file-file berikut:

| File | Perubahan |
|------|-----------|
| `resources/views/landing/detailproduk/show.blade.php` | `asset($produk->gambar)` → `asset('storage/' . $produk->gambar)` |
| `resources/views/landing/dokter/list.blade.php` | `asset($d->gambar)` → `asset('storage/' . $d->gambar)` |
| `resources/views/landing/dokter/chat.blade.php` | `asset($dokter->gambar)` → `asset('storage/' . $dokter->gambar)` |
| `resources/views/landing/sections/dokter.blade.php` | `asset($d->gambar)` → `asset('storage/' . $d->gambar)` |

### 2. 📋 Langkah-Langkah Next:

#### A. Pastikan Symbolic Link Dibuat
Jalankan perintah ini di terminal project:
```bash
php artisan storage:link
```

**Penjelasan:**
- Command ini membuat symlink dari `storage/app/public/` ke `public/storage/`
- Ini memungkinkan file yang disimpan di `/storage/app/public/` dapat diakses via `/storage/` URL
- Tanpa ini, gambar tidak akan muncul meskipun sudah diperbaiki path-nya

#### B. Verifikasi Struktur Folder
Pastikan struktur ini ada:
```
storage/
├── app/
│   └── public/
│       └── produk/        (folder untuk upload gambar produk)
│           └── [file gambar di sini]
public/
└── storage/               ← Ini adalah symlink ke storage/app/public
    └── produk/
```

#### C. Test Upload Gambar Baru
1. Masuk ke admin panel Filament
2. Buat atau edit produk
3. Upload gambar melalui field `Gambar Produk`
4. Simpan
5. Lihat di website - gambar harus muncul

#### D. Untuk Gambar Lama (di public/images/produk)
Jika ada gambar lama yang tersimpan di `public/images/produk/`, gunakan path full:
- Di database, isi field `gambar` dengan: `../images/produk/filename.jpg`
- Atau pindahkan gambar ke `storage/app/public/produk/` dan update path di database

### 3. 🔧 Konfigurasi Filament (Current)

**File:** `app/Filament/Resources/Produks/Schemas/ProdukForm.php`

```php
FileUpload::make('gambar')
    ->label('Gambar Produk')
    ->image()
    ->directory('produk')              // Folder upload
    ->visibility('public')              // Akses publik
    ->imagePreviewHeight('200'),
```

**Penjelasan:**
- `directory('produk')` → Simpan ke `storage/app/public/produk/`
- `visibility('public')` → Buat file dapat diakses publik
- File yang diupload akan disimpan dengan path relatif: `produk/filename.jpg`

### 4. 💾 Storage Configuration

**File:** `config/filesystems.php`

Konfigurasi sudah benar:
```php
'public' => [
    'driver' => 'local',
    'root' => storage_path('app/public'),
    'url' => rtrim(env('APP_URL', 'http://localhost'), '/').'/storage',
    'visibility' => 'public',
],
```

### 5. 🧪 Cara Test
1. Buka DevTools (F12) → Network tab
2. Load halaman produk
3. Bandingkan URL gambar dengan struktur folder storage
4. Jika 404, berarti:
   - Symlink belum dibuat → jalankan `php artisan storage:link`
   - Atau path di database salah

## Tips Troubleshooting

### Gambar Masih Tidak Muncul?
1. ✅ Pastikan `php artisan storage:link` sudah dijalankan
2. ✅ Cek folder `public/storage` exists (hasil dari symlink)
3. ✅ Cek browser console untuk error 404
4. ✅ Restart development server setelah storage:link
5. ✅ Clear browser cache (Ctrl+Shift+Del)

### Symlink Tidak Bisa Dibuat (Windows)?
Alternatif untuk Windows (jalankan Command Prompt as Administrator):
```bash
# Jika --relative tidak work, coba:
php artisan storage:link

# Atau jika pakai Windows PowerShell (as Admin):
New-Item -ItemType SymbolicLink -Path "public\storage" -Target "storage\app\public"
```

## Summary
- ✅ View files sudah diperbaiki dengan path yang benar
- 📌 User perlu menjalankan `php artisan storage:link`
- 🎯 Kemudian upload gambar baru melalui admin panel
- ✨ Gambar akan muncul di website secara otomatis
