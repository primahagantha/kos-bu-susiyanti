<?php
include 'auth_check.php';
// Mengaktifkan laporan error untuk debugging
error_reporting(E_ALL);
ini_set('display_errors', 'On');

// ... Kode Anda ...

?>

<?php
// Sertakan file koneksi.php untuk menghubungkan ke database
include_once "koneksi.php";

// Ambil data dari formulir pengeditan pemilik yang dikirim melalui metode POST
$no = $_POST['no'];
$nama_pemilik = $_POST['nama_pemilik'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];

// Lakukan query UPDATE untuk mengedit data pemilik di database menggunakan Prepared Statement
$stmt = $conn->prepare("UPDATE nama_pemilik SET nama_pemilik=?, alamat=?, no_hp=? WHERE no=?");
$stmt->bind_param("sssi", $nama_pemilik, $alamat, $no_hp, $no);
$query = $stmt->execute();

// Periksa apakah query berhasil dieksekusi
if ($query) {
    // Jika berhasil, tampilkan pesan sukses dan redirect menggunakan SweetAlert2
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
                text: 'Data pemilik berhasil diperbarui!',
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
    // Jika gagal, tampilkan pesan kesalahan menggunakan SweetAlert2
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
                text: 'Edit data pemilik gagal: " . addslashes($stmt->error) . "',
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
?>
