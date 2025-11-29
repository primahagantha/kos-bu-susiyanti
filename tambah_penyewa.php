<?php
include 'auth_check.php';
// Sertakan file koneksi ke database
include_once 'koneksi.php';

// Periksa apakah formulir telah dikirim (submitted)
if (isset($_POST['tambah'])) {
    // Dapatkan data dari formulir
    $no = $_POST['no'];
    $nama_penyewa = $_POST['nama_penyewa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $lantai = $_POST['lantai'];
    $no_kamar = $_POST['no_kamar'];
    $no_hp = $_POST['no_hp'];

    // Sisipkan data ke dalam tabel 'nama_penyewa' menggunakan Prepared Statement
    $stmt = $conn->prepare("INSERT INTO nama_penyewa (no, nama_penyewa, jenis_kelamin, lantai, no_kamar, no_hp) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ississ", $no, $nama_penyewa, $jenis_kelamin, $lantai, $no_kamar, $no_hp);
    $input = $stmt->execute();

    // Periksa apakah data berhasil dimasukkan atau tidak
    if ($input) {
        // Tampilkan pesan sukses dan alihkan ke halaman daftar penyewa menggunakan SweetAlert2
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
                    window.location.href = 'daftar_penyewa.php';
                });
            </script>
        </body>
        </html>";
    } else {    
        // Tampilkan pesan error dan berikan tautan untuk kembali menggunakan SweetAlert2
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
    // Jika formulir tidak dikirim, atau setelah penambahan data, alihkan pengguna kembali ke halaman daftar penyewa
    header("location: daftar_penyewa.php");
}
?>
