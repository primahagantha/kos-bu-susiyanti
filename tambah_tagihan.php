<?php
include 'auth_check.php';
// Sertakan file koneksi ke database
include_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Tambah Tagihan</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
// Periksa apakah formulir telah dikirim (submitted)
if (isset($_POST['tambah'])) {
    // Dapatkan data dari formulir
    $no_kamar = $_POST['no_kamar'];
    $jumlah_tagihan = $_POST['jumlah_tagihan'];
    $keterangan_pembayaran = $_POST['keterangan_pembayaran'];

    // Sisipkan data ke dalam tabel 'tagihan' menggunakan Prepared Statement
    $stmt = $conn->prepare("INSERT INTO tagihan (no_kamar, jumlah_tagihan, keterangan_pembayaran) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $no_kamar, $jumlah_tagihan, $keterangan_pembayaran);
    
    if ($stmt->execute()) {
        echo "<script>
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data tagihan berhasil ditambahkan.',
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
                text: 'Data tagihan gagal ditambahkan: " . $stmt->error . "',
                icon: 'error',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'index_tagihan.php';
                }
            });
        </script>";
    }
    $stmt->close();
} else {
    // Jika formulir tidak dikirim, alihkan pengguna kembali ke halaman daftar tagihan
    header("location: daftar_tagihan.php");
}
?>
</body>
</html>
