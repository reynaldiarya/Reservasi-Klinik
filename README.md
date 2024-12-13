# Website Reservasi Klinik Doktor

Website Reservasi Klinik Doktor adalah platform berbasis web yang dirancang untuk memudahkan proses reservasi layanan klinik. Sistem ini mendukung berbagai jenis pengguna (Pasien, Admin, dan Dokter) dengan fitur yang sesuai kebutuhan masing-masing.

## Role Pengguna

- **Pasien (Level 0)**: Pengguna utama yang dapat mendaftar, login, dan melakukan reservasi.
- **Admin (Level 1)**: Bertanggung jawab mengelola data klinik, pasien, dan jadwal.
- **Dokter (Level 2)**: Dapat melihat jadwal pasien dan mencatat hasil pemeriksaan.

## Fitur Utama

### **Fitur untuk Pasien**
- **Hubungi Admin**: Pasien dapat menghubungi admin melalui kolom *hubungi* di halaman utama.
  - **Route**: `/`
  - **View**: `landing.blade`
  - **Controller**: `landingController`

- **Cari Jadwal Pemeriksaan**: Pasien dapat mencari tanggal pemeriksaan yang tersedia tanpa perlu login. Sistem menggunakan algoritma untuk menghitung jumlah jadwal yang sesuai dengan tanggal yang diinputkan oleh pengguna.
  - **Route**: `/`
  - **View**: `landing.blade`
  - **Controller**: `landingController`

- **Registrasi Pasien**: Fitur untuk mendaftarkan akun baru.
  - **Route**: `/register`
  - **View**: `register.blade`
  - **Controller**: `registerController`

- **Login Pasien**: Tampilan login seragam untuk pasien, admin, dan dokter, tetapi dibedakan berdasarkan level pengguna di `loginController`.
  - **Route**: `/login`
  - **View**: `login.blade`
  - **Controller**: `loginController`

- **Dashboard Pasien**: Berisi informasi tentang jumlah reservasi yang dilakukan dan pemeriksaan yang telah selesai.
  - **Route**: `/dashboard`
  - **View**: `dashboardpasien.blade`
  - **Controller**: `dashboardController`

## Teknologi yang Digunakan

- **Laravel**: Framework PHP untuk pengembangan web.
- **Blade Templating**: Untuk pembuatan halaman dinamis.
- **Bootstrap**: Untuk antarmuka pengguna yang responsif dan menarik.
- **MySQL**: Basis data untuk menyimpan informasi pengguna, reservasi, dan jadwal.

## Cara Menjalankan Proyek

1. Clone repository ini:
   ```bash
   git clone https://github.com/username/website-klinik.git
   ```
2. Masuk ke folder proyek:
   ```bash
   cd website-klinik
   ```
3. Instal dependensi Laravel menggunakan Composer:
   ```bash
   composer install
   ```
4. Buat file `.env` dan sesuaikan konfigurasi database:
   ```bash
   cp .env.example .env
   ```
5. Generate application key:
   ```bash
   php artisan key:generate
   ```
6. Migrasi database:
   ```bash
   php artisan migrate
   ```
7. Jalankan server lokal:
   ```bash
   php artisan serve
   ```
8. Akses aplikasi di browser melalui:
   ```
   http://localhost:8000
   ```

## Lisensi

Proyek ini dilisensikan di bawah Lisensi MIT. Anda bebas menggunakan, mengedit, dan mendistribusikannya dengan atribusi yang sesuai.

---

**Catatan:** Proyek ini dibuat untuk memenuhi tugas mata kuliah Pemrograman Web Berbasis Framework dan bertujuan untuk mempraktikkan pengembangan aplikasi web berbasis Laravel.

