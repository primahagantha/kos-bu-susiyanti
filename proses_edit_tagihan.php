<?php
include 'auth_check.php';
// Sertakan file koneksi.php untuk menghubungkan ke database
include_once "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Edit Tagihan</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
// Ambil data dari formulir pengeditan tagihan yang dikirim melalui metode POST
$no = $_POST['no'];
$no_kamar = $_POST['no_kamar'];
$jumlah_tagihan = $_POST['jumlah_tagihan'];
$keterangan_pembayaran = $_POST['keterangan_pembayaran'];

// Lakukan query UPDATE untuk mengedit data tagihan di database menggunakan Prepared Statement
$stmt = $conn->prepare("UPDATE tagihan SET no_kamar=?, jumlah_tagihan=?, keterangan_pembayaran=? WHERE no=?");
$stmt->bind_param("sssi", $no_kamar, $jumlah_tagihan, $keterangan_pembayaran, $no);

if ($stmt->execute()) {
    echo "<script>
        Swal.fire({
            title: 'Berhasil!',
            text: 'Data tagihan berhasil diperbarui.',
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
            text: 'Data tagihan gagal diperbarui: " . $stmt->error . "',
            icon: 'error',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'edit_tagihan.php?no=" . $no . "';
            }
        });
    </script>";
}
$stmt->close();
?>
</body>
</html>
