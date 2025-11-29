<?php include 'auth_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap">
    <title>Kos Bu Susiyanti - Edit Kamar</title>
    <link rel="icon" href="usu.png">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #dde0e3;
        }

        .container-fluid {
            margin-top: 20px;
        }

        .col-lg-12.text-center {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        /* Gaya untuk tombol Simpan Perubahan */
        button.btn-primary {
            background-color: #286589;
            color: #fff;
        }

        button.btn-primary:hover {
            background-color: #F6F9FA;
            color: #286589;
        }
    </style>
</head>

<body style="background-color: #dde0e3;">
    <!-- Tubuh dari dokumen HTML -->
    <?php include_once "sidebar.php"; ?>
    <!-- Penyertaan (inclusion) konten dari file sidebar.php -->

    <div class="container-fluid">
        <!-- Container fluid untuk menyusun layout halaman -->
        <div class="row justify-content-center">
            <!-- Baris (row) yang diatur menjadi berada di tengah halaman -->
            <div class="col-lg-8 offset-lg-2">
                <!-- Kolom lebar 8 dengan offset 2 (menggeser posisi kolom) -->
                <div class="col-lg-12 text-center mt-5 mb-5">
                    <!-- Kolom lebar 12 dengan teks yang berpusat, margin atas dan bawah -->
                    <h3 class="display-4">Edit Data Kamar</h3>
                    <!-- Judul halaman dengan gaya teks display-4 -->
                </div>
                <?php
               include "koneksi.php";
                $no_kamar = $_GET['no_kamar'];
                $stmt = $conn->prepare("SELECT * FROM daftar_kamar WHERE no_kamar=?");
                $stmt->bind_param("s", $no_kamar);
                $stmt->execute();
                $result = $stmt->get_result();
                $data = $result->fetch_assoc();
                $stmt->close();
                ?>
                <!-- Pemanggilan file koneksi.php dan pengaturan koneksi ke database -->
                <form action="proses_edit_kamar.php" method="post">
                    <!-- Formulir dengan metode POST dan aksi menuju proses_edit_kamar.php -->
                    <input type="hidden" name="no_kamar" value="<?php echo $data['no_kamar']; ?>">
                    <!-- Input tersembunyi untuk menyimpan nomor kamar yang tidak dapat diubah oleh pengguna -->
                    <div class="form-group">
                        <!-- Grup formulir untuk nomor kamar -->
                        <label for="no_kamar">No Kamar:</label>
                        <!-- Label untuk input nomor kamar -->
                        <input type="text" class="form-control" id="no_kamar" name="no_kamar"
                            value="<?php echo $data['no_kamar']; ?>" disabled>
                        <!-- Input nomor kamar yang tidak dapat diubah oleh pengguna -->
                    </div>
                    <div class="form-group">
                        <!-- Grup formulir untuk lantai kamar -->
                        <label for="lantai">Lantai:</label>
                        <!-- Label untuk input lantai kamar -->
                        <input type="text" class="form-control" id="lantai" name="lantai"
                            value="<?php echo $data['lantai']; ?>" required>
                        <!-- Input lantai kamar yang wajib diisi -->
                    </div>
                    <div class="form-group">
                        <!-- Grup formulir untuk fasilitas kamar -->
                        <label for="fasilitas">Fasilitas:</label>
                        <!-- Label untuk input fasilitas kamar -->
                        <input type="text" class="form-control" id="fasilitas" name="fasilitas"
                            value="<?php echo $data['fasilitas']; ?>" required>
                        <!-- Input fasilitas kamar yang wajib diisi -->
                    </div>
                    <div class="form-group">
                        <!-- Grup formulir untuk harga sewa kamar -->
                        <label for="harga_sewa">Harga Sewa:</label>
                        <!-- Label untuk input harga sewa kamar -->
                        <input type="text" class="form-control" id="harga_sewa" name="harga_sewa"
                            value="<?php echo $data['harga_sewa']; ?>" required>
                        <!-- Input harga sewa kamar yang wajib diisi -->
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <!-- Tombol untuk menyimpan perubahan pada formulir -->
                </form>
            </div>
        </div>
    </div>
</body>
</html>
