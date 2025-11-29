<?php
include 'auth_check.php';
// Mengimport (menggunakan) file koneksi.php untuk terhubung ke database
include_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Hapus Tagihan</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
// Mendapatkan nomor dari parameter URL menggunakan metode GET
$no = $_GET['no'];

// Lakukan query DELETE untuk menghapus data tagihan dari database menggunakan Prepared Statement
$stmt = $conn->prepare("DELETE FROM tagihan WHERE no=?");
$stmt->bind_param("i", $no);

if ($stmt->execute()) {
    echo "<script>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data tagihan berhasil dihapus.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'daftar_tagihan.php';
            }
        });
    </script>";
} else {
    echo "<script>
        Swal.fire({
            title: 'Gagal!',
            text: 'Data tagihan gagal dihapus: " . $stmt->error . "',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'daftar_tagihan.php';
            }
        });
    </script>";
}
$stmt->close();
?>
</body>
</html>
