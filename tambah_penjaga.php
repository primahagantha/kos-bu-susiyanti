<?php
include 'auth_check.php';
// Include file koneksi.php untuk menghubungkan ke database
include_once 'koneksi.php';

// Periksa apakah tombol 'tambah' ditekan pada formulir
if (isset($_POST['tambah'])) {
    // Ambil data dari formulir
    $no = $_POST['no'];
    $nama_penjaga = $_POST['nama_penjaga'];
    $no_hp = $_POST['no_hp'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $jadwal_kerja = $_POST['jadwal_kerja'];

    // Lakukan operasi INSERT INTO untuk memasukkan data ke tabel 'nama_penjaga' menggunakan Prepared Statement
    $stmt = $conn->prepare("INSERT INTO nama_penjaga (no, nama_penjaga, no_hp, jenis_kelamin, jadwal_kerja) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $no, $nama_penjaga, $no_hp, $jenis_kelamin, $jadwal_kerja);
    $input = $stmt->execute();

    // Periksa apakah data berhasil dimasukkan
    if ($input) {
        // Tampilkan pesan sukses dan redirect ke halaman 'daftar_penjaga' menggunakan SweetAlert2
        echo "<!DOCTYPE html>
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <style>body { font-family: 'Poppins', sans-serif; }</style>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data berhasil ditambahkan!',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    window.location.href = 'daftar_penjaga.php';
                });
            </script>
        </body>
        </html>";
    } else {    
        // Tampilkan pesan gagal dan link kembali ke 'index_penjaga' menggunakan SweetAlert2
        echo "<!DOCTYPE html>
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <style>body { font-family: 'Poppins', sans-serif; }</style>
        </head>
        <body>
            <script>
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Data gagal ditambahkan: " . addslashes($stmt->error) . "',
                    icon: 'error',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'Kembali'
                }).then((result) => {
                    window.history.back();
                });
            </script>
        </body>
        </html>";
    }
    $stmt->close();
} else {
    // Redirect ke halaman 'daftar_penjaga' jika tidak ada data yang dikirim
    header("location: daftar_penjaga.php");
}
?>
