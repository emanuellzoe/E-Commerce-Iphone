#  E-Commerce Apple Store (Laravel)

> **Aplikasi E-Commerce Premium Berbasis Web untuk Penjualan Produk Apple.**
>
> Proyek ini dirancang dengan antarmuka **Modern Dark Mode** (Glassmorphism), dilengkapi fitur pencarian instan (Live Search), manajemen stok cerdas, dan integrasi pemesanan langsung.

![Apple Store Banner](https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg)

## 📖 Deskripsi Proyek

Aplikasi ini dibangun menggunakan framework **Laravel** dengan fokus pada User Experience (UX) yang elegan dan kemudahan manajemen bagi admin. Sistem ini membagi peran menjadi dua: **Pengunjung (Visitor)** yang dapat mencari dan memesan produk, serta **Administrator** yang mengelola inventaris, pesanan, dan pengguna.

Desain antarmuka terinspirasi dari estetika Apple, menggunakan warna gelap, transparansi (glass effect), dan animasi halus untuk memberikan kesan premium.

## ✨ Fitur Utama

### 🛍️ Modul Pengunjung (User Features)
1.  **Premium Hero Landing Page:**
    *   Animasi intro yang elegan saat halaman dimuat (Judul & Search Bar muncul perlahan).
    *   Desain responsif yang menyesuaikan dengan Desktop, Tablet, dan Mobile.
2.  **Live Search (Pencarian Instan):**
    *   Pengunjung dapat mencari produk berdasarkan **Nama**, **Deskripsi**, atau **Harga**.
    *   Hasil pencarian muncul secara *real-time* tanpa reload halaman (AJAX).
3.  **Halaman Detail Produk:**
    *   Showcase produk dengan gambar besar.
    *   Informasi stok dan harga yang jelas.
4.  **Sistem Pemesanan (Direct Order):**
    *   **Beli Sekarang:** Modal popup untuk mengisi Nama, Alamat, dan Metode Pengiriman (Delivery/Pickup).
    *   **Notifikasi Sukses:** Alert konfirmasi otomatis setelah pesanan berhasil dibuat.
5.  **Integrasi WhatsApp:**
    *   Tombol "Tanya via WhatsApp" yang otomatis membuka chat ke nomor admin dengan template pesan berisi detail produk.

### 🛠️ Modul Administrator (Admin Dashboard)
1.  **Dashboard Modern (Dark UI):**
    *   Navigasi sidebar yang solid dan konsisten.
    *   Antarmuka tabel yang bersih dan mudah dibaca.
2.  **Notifikasi Order Real-time:**
    *   **Badge Merah** pada ikon keranjang di header yang menunjukkan jumlah pesanan baru (Pending).
    *   Posisi badge presisi dan tidak terpotong.
3.  **Manajemen Produk (CRUD):**
    *   Tambah, Edit, Hapus produk dengan upload gambar.
    *   **Smart Stock Alert:** Baris produk otomatis berubah warna **Merah** jika stok menipis (≤ 5), memudahkan admin melakukan restock.
4.  **Manajemen Order:**
    *   Melihat daftar pesanan masuk lengkap dengan data pembeli.
    *   Status indikator pengiriman (Delivery/Pickup).
5.  **Manajemen User:**
    *   Mengelola akun staff/admin.
    *   Tampilan foto profil berbentuk lingkaran sempurna (Avatar).
6.  **Keamanan:**
    *   Sistem Login/Logout aman menggunakan Laravel Auth.
    *   Konfirmasi Hapus Data menggunakan **Modal Popup** (bukan alert browser biasa) untuk mencegah kesalahan klik.

## 📖 Panduan Penggunaan (User Manual)

### Skenario 1: Pengunjung Berbelanja
1.  **Akses Website:** Buka halaman utama, nikmati animasi intro.
2.  **Cari Barang:** Ketik "iPhone" atau "15 Juta" di kolom pencarian. Produk akan langsung tampil.
3.  **Lihat Detail:** Klik produk untuk melihat spesifikasi.
4.  **Order:**
    *   Klik **Beli Sekarang** -> Isi Form -> Konfirmasi.
    *   Atau klik **WhatsApp** untuk negosiasi langsung.

### Skenario 2: Admin Mengelola Toko
1.  **Login:** Masuk melalui tombol "Login" di pojok kanan atas.
2.  **Cek Orderan:** Lihat ikon tas di atas. Jika ada angka merah, klik untuk melihat pesanan baru.
3.  **Kelola Stok:** Buka menu *Products*. Jika ada baris merah, segera edit stok produk tersebut.
4.  **Hapus Data:** Klik tombol sampah. Konfirmasi pada popup yang muncul.

## 🚀 Technology Stack

*   **Framework:** Laravel 6.x (PHP)
*   **Database:** MySQL
*   **Frontend:** Blade Templates, Bootstrap 4, Custom CSS (Glassmorphism), jQuery (AJAX).
*   **Assets:** Bootstrap Icons, Apple SVG Vectors.

## 📦 Installation Guide

### Prerequisites
*   PHP >= 7.2.5
*   Composer
*   MySQL Server (XAMPP/Laragon/Docker)

### Steps to Run

1.  **Clone the Repository**
    ```bash
    git clone https://github.com/emanuellzoe/E-Commerce-Apple.git
    cd E-Commerce-Apple
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    ```

3.  **Environment Setup**
    *   Copy file `.env`: `cp .env.example .env`
    *   Konfigurasi database di `.env`:
        ```env
        DB_DATABASE=ecommerce_db
        DB_USERNAME=root
        DB_PASSWORD=
        ```

4.  **Generate Key & Migrate**
    ```bash
    php artisan key:generate
    php artisan migrate
    ```

5.  **Link Storage (Penting untuk Gambar)**
    ```bash
    php artisan storage:link
    ```

6.  **Run Server**
    ```bash
    php artisan serve
    ```
    Buka: `http://localhost:8000`

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).