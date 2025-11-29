-- Seed data for users
-- Note: Password is plain text as per current system design
INSERT IGNORE INTO users (username, password) VALUES ('admin', 'admin');

-- Seed data for daftar_kamar
INSERT IGNORE INTO daftar_kamar (no_kamar, lantai, fasilitas, harga_sewa) VALUES 
('K001', 1, 'AC, WiFi, Kamar Mandi Dalam', 1500000),
('K002', 1, 'Non-AC, WiFi, Kamar Mandi Luar', 800000),
('K101', 2, 'AC, WiFi, TV', 1800000);

-- Seed data for nama_penyewa
INSERT IGNORE INTO nama_penyewa (no, nama_penyewa, jenis_kelamin, lantai, no_kamar, no_hp) VALUES 
(1, 'Budi Santoso', 'Laki-laki', 1, 'K001', '081234567890'),
(2, 'Siti Aminah', 'Perempuan', 2, 'K101', '089876543210');

-- Seed data for nama_pemilik
INSERT IGNORE INTO nama_pemilik (no, nama_pemilik, alamat, no_hp) VALUES 
(1, 'Bu Susiyanti', 'Jl. Merdeka No. 45', '08111222333');

-- Seed data for nama_penjaga
INSERT IGNORE INTO nama_penjaga (no, nama_penjaga, no_hp, jenis_kelamin, jadwal_kerja) VALUES 
(1, 'Pak Joko', '08555666777', 'Laki-laki', 'Pagi - Sore');

-- Seed data for tagihan
INSERT IGNORE INTO tagihan (no_kamar, jumlah_tagihan, keterangan_pembayaran) VALUES 
('K001', 1500000, 'Lunas'),
('K101', 1800000, 'Belum Lunas');
