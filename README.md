# Sistem Informasi Manajemen Kos "Bu Susiyanti"

Aplikasi berbasis web untuk mempermudah pengelolaan data kos, mulai dari data kamar, penyewa, pemilik, penjaga, hingga tagihan bulanan. Aplikasi ini dirancang dengan antarmuka yang sederhana dan responsif menggunakan Bootstrap.

## 📋 Fitur Utama

Aplikasi ini memiliki fitur **CRUD (Create, Read, Update, Delete)** lengkap untuk entitas berikut:

*   **Manajemen Kamar**: Kelola data nomor kamar, lantai, fasilitas, dan harga sewa.
*   **Manajemen Penyewa**: Data lengkap penyewa termasuk nama, jenis kelamin, dan kontak.
*   **Manajemen Pemilik**: Data pemilik kos.
*   **Manajemen Penjaga**: Data penjaga kos beserta jadwal kerjanya.
*   **Manajemen Tagihan**: Pencatatan tagihan per kamar dan status pembayaran.
*   **Dashboard**: Ringkasan statistik jumlah kamar terisi dan kosong.
*   **Otentikasi**: Sistem login aman untuk admin.

## 🛠️ Teknologi yang Digunakan

*   **Bahasa Pemrograman**: PHP (Native)
*   **Database**: MySQL
*   **Frontend Framework**: Bootstrap 4
*   **Alerts**: SweetAlert2 (untuk notifikasi yang interaktif)
*   **Icons**: FontAwesome / Boxicons
*   **Testing**: Playwright (Python) untuk otomatisasi pengujian.

## 🚀 Cara Instalasi

### Prasyarat
*   Web Server (XAMPP, WAMP, laragon atau sejenisnya)
*   PHP 7.4 atau lebih baru
*   MySQL Database

### Langkah-langkah

1.  **Clone Repository**
    ```bash
    git clone https://github.com/primahagantha/kos-bu-susiyanti.git
    ```

2.  **Setup Database**
    *   Buka phpMyAdmin (biasanya di `http://localhost/phpmyadmin`).
    *   Buat database baru dengan nama `kos_bu_susiyanti`.
    *   Import file `database.sql` yang ada di root direktori project ke dalam database tersebut.

3.  **Konfigurasi Koneksi**
    *   Buka file `koneksi.php`.
    *   Pastikan konfigurasi database sesuai dengan server lokal Anda:
        ```php
        $servername = "localhost";
        $username = "root"; // Sesuaikan
        $password = "";     // Sesuaikan
        $database = "kos_bu_susiyanti";
        ```

4.  **Jalankan Aplikasi**
    *   Pindahkan folder project ke `htdocs` (jika menggunakan XAMPP).
    *   Akses melalui browser: `http://localhost/kos-bu-susiyanti`
    *   Atau gunakan PHP built-in server:
        ```bash
        php -S localhost:8080
        ```
        Lalu akses `http://localhost:8080`.

## 🔑 Akun Default

Gunakan akun berikut untuk masuk ke sistem:

*   **Username**: `admin`
*   **Password**: `admin`

## 🧪 Pengujian (Testing)

Project ini menyertakan skenario pengujian otomatis menggunakan **Playwright**.

### Menjalankan Test
1.  Pastikan Python dan Playwright terinstall:
    ```bash
    pip install playwright
    playwright install chromium
    ```
2.  Jalankan script test:
    ```bash
    python test_scenario.py
    ```

## 📂 Struktur Folder

```
/
├── css/                # File CSS tambahan
├── js/                 # File JavaScript tambahan
├── database.sql        # File dump database
├── index.php           # Halaman utama (redirect ke login)
├── login.php           # Halaman login
├── dashboard.php       # Halaman dashboard admin
├── daftar_*.php        # Halaman list data (Kamar, Penyewa, dll)
├── tambah_*.php        # Form tambah data
├── edit_*.php          # Form edit data
├── proses_*.php        # Logika pemrosesan data
├── hapus_*.php         # Logika penghapusan data
└── test_scenario.py    # Script testing otomatis
```

## 📝 Catatan Pengembang

*   Pastikan file `auth_check.php` disertakan di setiap halaman yang membutuhkan proteksi login.
*   Gunakan `secure_pages.py` jika ingin menambahkan proteksi otomatis ke file PHP baru.

---
**Dibuat oleh Kelompok 3 Project Perangkat Lunak**
