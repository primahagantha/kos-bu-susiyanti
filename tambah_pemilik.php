<?php
include 'auth_check.php';
// Sertakan file koneksi.php untuk menghubungkan ke database
include_once 'koneksi.php';

// Periksa apakah tombol 'tambah' ditekan pada formulir
if (isset($_POST['tambah'])) {
    // Ambil data dari formulir
    $no = $_POST['no'];
    $nama_pemilik = $_POST['nama_pemilik'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];

    // Lakukan operasi INSERT INTO untuk memasukkan data ke tabel 'nama_pemilik' menggunakan Prepared Statement
    $stmt = $conn->prepare("INSERT INTO nama_pemilik (no, nama_pemilik, alamat, no_hp) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $no, $nama_pemilik, $alamat, $no_hp);
    $input = $stmt->execute();

    // Periksa apakah data berhasil dimasukkan
    if ($input) {
        // Tampilkan pesan sukses dan redirect ke halaman 'daftar_pemilik' menggunakan SweetAlert2
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
                    window.location.href = 'daftar_pemilik.php';
                });
            </script>
        </body>
        </html>";
    } else {    
        // Tampilkan pesan gagal menggunakan SweetAlert2
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
                    window.location.href = 'index_pemilik.php';
                });
            </script>
        </body>
        </html>";
    }
    $stmt->close();
} else {
    // Redirect ke halaman 'daftar_pemilik' jika tidak ada data yang dikirim
    header("location: daftar_pemilik.php");
}
?>
