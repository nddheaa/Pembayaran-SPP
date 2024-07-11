# 🌟 Web Pembayaran SPP 🌟

Selamat datang di repositori Web Pembayaran SPP! 🎉 Proyek ini bertujuan untuk menyediakan solusi pembayaran SPP yang mudah dan efisien untuk sekolah-sekolah. 💰🏫

## 🚀 Fitur Utama

- **Melakukan Pembayaran**: Memudahkan pembayaran SPP melalui berbagai metode pembayaran. 💳📲
- **Riwayat Pembayaran**: Melihat riwayat transaksi pembayaran SPP📲
- **Cetak Kwitansi**: Cetak bukti pembayaran secara instan. 🧾
- **Cetak Kartu SPP**: Dapatkan kartu SPP dengan mudah. 🏷️
- **Dashboard Admin**: Kelola dan monitoring pembayaran dengan mudah. 📊🔧
- **Dashboard Siswa**: Siswa dapat melihat riwayat pembayaran dan status pembayaran. 👩‍🎓👨‍🎓

## 📸 Tampilan

![Tampilan Utama](link-ke-gambar-tampilan.png)

## 🛠️ Teknologi yang Digunakan

- **Framework**: Laravel 🛠️
- **Database**: MySQL 🗄️

## 📋 Cara Instalasi

1. **Clone Repository**:
    ```bash
    git clone https://github.com/username/web-pembayaran-spp.git
    cd web-pembayaran-spp
    ```

2. **Instalasi Dependencies**:
    ```bash
    composer install
    npm install
    ```

3. **Konfigurasi Environment**:
    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database dan lainnya:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Migrasi dan Seed Database**:
    ```bash
    php artisan migrate --seed
    ```

5. **Jalankan Server**:
    ```bash
    php artisan serve
    ```

6. **Buka di Browser**:
    Buka `http://localhost:8000` di browser favorit Anda. 🌐

## ➕ Buat Pengguna Operator

Setelah instalasi selesai, Anda dapat membuat pengguna `operator` dengan menggunakan Laravel Tinker.

1. **Buka Tinker**:
    ```bash
    php artisan tinker
    ```

2. **Buat Pengguna Operator**:
    ```php
    User::create([
        'name' => 'operator',
        'email' => 'operator1@contoh.com',
        'password' => bcrypt('1'),
        'akses' => 'operator',
        'nohp' => '081234567890',
        'nohp_verified_at' => now(),
        'email_verified_at' => now(),
    ]);
    ```

3. **Keluar dari Tinker**:
    ```php
    exit
    ```

Terima kasih telah menggunakan Web Pembayaran SPP! 🚀💖
