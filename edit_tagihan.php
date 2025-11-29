<?php include 'auth_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bagian kepala dokumen HTML -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Penambahan stylesheet dari Bootstrap -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap">
    <!-- Penambahan stylesheet dari Google Fonts untuk font Poppins -->
    <title>Kos Bu Susiyanti - Edit Tagihan</title>
    <!-- Judul halaman web -->
    <link rel="icon" href="usu.png">
    <!-- Penambahan ikon pada tab browser -->
    <style>
        /* Gaya CSS internal untuk menentukan tampilan halaman */
        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins untuk seluruh halaman */
            background-color: #dde0e3; /* Warna latar belakang halaman */
        }

        .container-fluid {
            margin-top: 20px; /* Jarak atas container dari elemen di atasnya */
        }

        .col-lg-12.text-center {
            margin-top: 50px;
            margin-bottom: 50px; /* Jarak atas dan bawah kolom lebar 12 dengan teks yang berpusat */
        }

        /* Gaya untuk tombol Simpan Perubahan */
        button.btn-primary {
            background-color: #286589; /* Warna latar belakang tombol */
            color: #fff; /* Warna teks tombol */
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button.btn-primary:hover {
            background-color: #1a4a66; /* Warna latar belakang tombol saat dihover */
            color: #fff; /* Warna teks tombol saat dihover */
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .card-body {
            padding: 40px;
        }
    </style>
</head>

<body style="background-color: #dde0e3;">
    <!-- Tubuh dari dokumen HTML dengan latar belakang berwarna #dde0e3 -->
    <?php include_once "sidebar.php"; ?>
    <!-- Penyertaan (inclusion) konten dari file sidebar.php -->

    <div class="container-fluid">
        <!-- Container fluid untuk menyusun layout halaman -->
        <div class="row justify-content-center">
            <!-- Baris (row) yang diatur menjadi berada di tengah halaman -->
            <div class="col-lg-8 col-md-10">
                <!-- Kolom lebar 8 dengan offset 2 (menggeser posisi kolom) -->
                <div class="col-lg-12 text-center mt-5 mb-5">
                    <!-- Kolom lebar 12 dengan teks yang berpusat, margin atas dan bawah -->
                    <h3 class="display-4">Edit Data Tagihan</h3>
                    <!-- Judul halaman dengan gaya teks display-4 -->
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <?php
                        include "koneksi.php";
                        $no = $_GET['no'];
                        $stmt = $conn->prepare("SELECT * FROM tagihan WHERE no=?");
                        $stmt->bind_param("i", $no);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $data = $result->fetch_assoc();
                        $stmt->close();
                        ?>
                        <form action="proses_edit_tagihan.php" method="post">
                            <!-- Form untuk mengirim data ke proses_edit_tagihan.php dengan metode POST -->
                            <input type="hidden" name="no" value="<?php echo $data['no']; ?>">
                            <!-- Input tersembunyi untuk menyimpan nomor -->
                            <div class="form-group">
                                <label for="no">No.</label>
                                <input type="number" class="form-control" id="no" name="no" value="<?php echo $data['no']; ?>" disabled>
                                <!-- Input untuk nomor, dinonaktifkan (disabled) karena tidak dapat diubah -->
                            </div>
                            <div class="form-group">
                                <label for="no_kamar">No Kamar:</label>
                                <input type="number" class="form-control" id="no_kamar" name="no_kamar" value="<?php echo htmlspecialchars($data['no_kamar']); ?>" required>
                                <!-- Input untuk nomor kamar, wajib diisi (required) -->
                            </div>
                            <div class="form-group">
                                <label for="jumlah_tagihan">Jumlah Tagihan:</label>
                                <input type="text" class="form-control" id="jumlah_tagihan" name="jumlah_tagihan"
                                    value="<?php echo htmlspecialchars($data['jumlah_tagihan']); ?>" required>
                                <!-- Input untuk jumlah tagihan, wajib diisi (required) -->
                            </div>
                            <div class="form-group">
                                <label for="keterangan_pembayaran">Keterangan Pembayaran:</label>
                                <input type="text" class="form-control" id="keterangan_pembayaran" name="keterangan_pembayaran"
                                    value="<?php echo htmlspecialchars($data['keterangan_pembayaran']); ?>" required>
                                <!-- Input untuk keterangan pembayaran, wajib diisi (required) -->
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                            <!-- Tombol untuk mengirim data form -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
