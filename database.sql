-- Database: kos_bu_susiyanti
CREATE DATABASE IF NOT EXISTS kos_bu_susiyanti;
USE kos_bu_susiyanti;

-- Table: users
-- Used in: login.php
-- Note: Password is stored as plain text based on login.php logic.
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert default user (admin/admin)
INSERT INTO users (username, password) VALUES ('admin', 'admin');

-- Table: daftar_kamar
-- Used in: tambah_kamar.php, edit_kamar.php, hapus_kamar.php, daftar_kamar.php
-- Primary Key: no_kamar (Manual Input)
CREATE TABLE IF NOT EXISTS daftar_kamar (
    no_kamar VARCHAR(50) PRIMARY KEY,
    lantai INT NOT NULL,
    fasilitas TEXT NOT NULL,
    harga_sewa DECIMAL(10, 2) NOT NULL
);

-- Table: nama_penyewa
-- Used in: tambah_penyewa.php, edit_penyewa.php, hapus_penyewa.php, daftar_penyewa.php
-- Primary Key: no (Manual Input)
CREATE TABLE IF NOT EXISTS nama_penyewa (
    no INT PRIMARY KEY,
    nama_penyewa VARCHAR(100) NOT NULL,
    jenis_kelamin VARCHAR(20) NOT NULL,
    lantai INT NOT NULL,
    no_kamar VARCHAR(50) NOT NULL,
    no_hp VARCHAR(20) NOT NULL
);

-- Table: nama_pemilik
-- Used in: tambah_pemilik.php, edit_pemilik.php, hapus_pemilik.php, daftar_pemilik.php
-- Primary Key: no (Manual Input)
CREATE TABLE IF NOT EXISTS nama_pemilik (
    no INT PRIMARY KEY,
    nama_pemilik VARCHAR(100) NOT NULL,
    alamat TEXT NOT NULL,
    no_hp VARCHAR(20) NOT NULL
);

-- Table: nama_penjaga
-- Used in: tambah_penjaga.php, edit_penjaga.php, hapus_penjaga.php, daftar_penjaga.php
-- Primary Key: no (Manual Input)
CREATE TABLE IF NOT EXISTS nama_penjaga (
    no INT PRIMARY KEY,
    nama_penjaga VARCHAR(100) NOT NULL,
    no_hp VARCHAR(20) NOT NULL,
    jenis_kelamin VARCHAR(20) NOT NULL,
    jadwal_kerja VARCHAR(100) NOT NULL
);

-- Table: tagihan
-- Used in: tambah_tagihan.php, edit_tagihan.php, hapus_tagihan.php, daftar_tagihan.php
-- Primary Key: no_kamar (Manual Input)
CREATE TABLE IF NOT EXISTS tagihan (
    no_kamar VARCHAR(50) PRIMARY KEY,
    jumlah_tagihan DECIMAL(10, 2) NOT NULL,
    keterangan_pembayaran TEXT NOT NULL
);
