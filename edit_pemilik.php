<?php include_once 'auth_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bagian kepala dokumen HTML -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Penambahan stylesheet dari Bootstrap dan Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap">
    <!-- Penambahan jenis font Poppins dari Google Fonts -->
    <title>Kos Bu Susiyanti - Edit Pemilik</title>
    <!-- Judul halaman web -->
    <link rel="icon" href="usu.png">
    <!-- Penambahan ikon pada tab browser -->
    <style>
        /* Gaya CSS internal untuk menentukan tampilan halaman */
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

        /* Gaya CSS untuk tombol Simpan Perubahan */
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
                    <h3 class="display-4">Edit Data Pemilik</h3>
                    <!-- Judul halaman dengan gaya teks display-4 -->
                </div>
                <?php
                include "koneksi.php";
               $no = $_GET['no'];
               $stmt = $conn->prepare("SELECT * FROM nama_pemilik WHERE no=?");
               $stmt->bind_param("s", $no);
               $stmt->execute();
               $result = $stmt->get_result();
                $data = $result->fetch_assoc();
                $stmt->close();
                ?>
                <!-- Pemanggilan file koneksi.php dan pengaturan koneksi ke database -->
                <form action="proses_edit_pemilik.php" method="post">
                    <!-- Formulir dengan metode POST dan aksi menuju proses_edit_pemilik.php -->
                    <input type="hidden" name="no" value="<?php echo $data['no']; ?>">
                    <!-- Input tersembunyi untuk menyimpan nomor pemilik yang tidak dapat diubah oleh pengguna -->
                    <div class="form-group">
                        <!-- Grup formulir untuk nomor pemilik -->
                        <label for="no">No:</label>
                        <!-- Label untuk input nomor pemilik -->
                        <input type="number" class="form-control" id="no" name="no" value="<?php echo $data['no']; ?>" disabled>
                        <!-- Input nomor pemilik yang tidak dapat diubah oleh pengguna -->
                    </div>
                    <div class="form-group">
                        <!-- Grup formulir untuk nama pemilik -->
                        <label for="nama_pemilik">Nama Pemilik:</label>
                        <!-- Label untuk input nama pemilik -->
                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik"
                            value="<?php echo $data['nama_pemilik']; ?>" required>
                        <!-- Input nama pemilik yang wajib diisi -->
                    </div>
                    <div class="form-group">
                        <!-- Grup formulir untuk alamat pemilik -->
                        <label for="alamat">Alamat:</label>
                        <!-- Label untuk input alamat pemilik -->
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            value="<?php echo $data['alamat']; ?>" required>
                        <!-- Input alamat pemilik yang wajib diisi -->
                    </div>
                    <div class="form-group">
                        <!-- Grup formulir untuk nomor HP pemilik -->
                        <label for="no_hp">No HP:</label>
                        <!-- Label untuk input nomor HP pemilik -->
                        <input type="text" class="form-control" id="no_hp" name="no_hp"
                            value="<?php echo $data['no_hp']; ?>" required>
                        <!-- Input nomor HP pemilik yang wajib diisi -->
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <!-- Tombol untuk menyimpan perubahan pada formulir -->
                </form>
            </div>
        </div>
    </div>
</body>
</html>
