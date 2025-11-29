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
    <title>Kos Bu Susiyanti - Edit Penjaga</title>
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
                    <h3 class="display-4">Edit Data Penjaga</h3>
                    <!-- Judul halaman dengan gaya teks display-4 -->
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <?php
                        include "koneksi.php";
                        $no = $_GET['no'];
                        $stmt = $conn->prepare("SELECT * FROM nama_penjaga WHERE no=?");
                        $stmt->bind_param("i", $no);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $data = $result->fetch_assoc();
                        $stmt->close();
                        ?>
                        <form action="proses_edit_penjaga.php" method="post">
                            <!-- Form untuk mengirim data ke proses_edit_penjaga.php dengan metode POST -->
                            <input type="hidden" name="no" value="<?php echo $data['no']; ?>">
                            <!-- Input tersembunyi untuk menyimpan nomor -->
                            <div class="form-group">
                                <label for="no">No.</label>
                                <input type="number" class="form-control" id="no" name="no" value="<?php echo $data['no']; ?>" disabled>
                                <!-- Input untuk nomor, dinonaktifkan (disabled) karena tidak dapat diubah -->
                            </div>
                            <div class="form-group">
                                <label for="nama_penjaga">Nama Penjaga:</label>
                                <input type="text" class="form-control" id="nama_penjaga" name="nama_penjaga"
                                    value="<?php echo htmlspecialchars($data['nama_penjaga']); ?>" required>
                                <!-- Input untuk nama penjaga, wajib diisi (required) -->
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP:</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo htmlspecialchars($data['no_hp']); ?>" required>
                                <!-- Input untuk nomor HP, wajib diisi (required) -->
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin:</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <!-- Dropdown untuk memilih jenis kelamin, wajib diisi (required) -->
                                    <option value="Pria" <?php if($data['jenis_kelamin'] == 'Pria') echo 'selected'; ?>>Pria</option>
                                    <option value="Wanita" <?php if($data['jenis_kelamin'] == 'Wanita') echo 'selected'; ?>>Wanita</option>
                                    <!-- Opsi jenis kelamin, yang terpilih sesuai data dari database -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jadwal_kerja">Jadwal Kerja:</label>
                                <input type="text" class="form-control" id="jadwal_kerja" name="jadwal_kerja" value="<?php echo htmlspecialchars($data['jadwal_kerja']); ?>" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
                            <!-- Tombol untuk mengirimkan form (submit) -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
