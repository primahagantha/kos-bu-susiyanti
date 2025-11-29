<?php include 'auth_check.php'; ?>
<!-- Bagian: Deklarasi Jenis Dokumen -->
<!DOCTYPE html>
<html lang="en">

<!-- Bagian: Kepala Dokumen -->
<head>
    <!-- Sertakan CSS Bootstrap dari CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- Setel judul dokumen -->
    <title>Kos Bu Susiyanti</title>
    
    <!-- Setel ikon untuk situs web -->
    <link rel="icon" href="usu.png">
    
    <!-- Gaya Internal -->
    <style>
        /* Sesuaikan ukuran font untuk heading display-4 */
        h3.display-4 {
            font-size: 2.0rem;
        }

        /* Gaya untuk tabel */
        table {
            text-align: center;
            font-size: 0.87rem;
            background-color: #AAB3B8;
        }

        /* Pusatkan konten di dalam sel tabel */
        th, td {
            vertical-align: middle;
            text-align: center;
        }

        /* Gaya untuk tombol "Tambah Data" */
        .tombol-tambah {
            display: inline-block;
            padding: 2px 5px;
            margin: 4px;
            color: #fff;
            border: 2px solid #A61212;
            background-color: #A61212;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 13px;
        }

        /* Gaya untuk tombol "Edit" dan "Hapus" */
        .tombol-edit,
        .tombol-hapus {
            display: inline-block;
            padding: 2px 3px;
            margin: 4px;
            color: #fff;
            border: 2px solid #A61212;
            background-color: #A61212;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 10px;
        }

        /* Efek hover untuk tombol */
        .tombol-tambah:hover,
        .tombol-edit:hover,
        .tombol-hapus:hover {
            background-color: #A61212;
            color: #fff;
            transform: scale(1.05);
        }
    </style>
</head>

<!-- Bagian: Tubuh Dokumen -->
<body style="background-color: #dde0e3;">
    <!-- Sertakan sidebar -->
    <?php include_once "sidebar.php"; ?>

    <!-- Kontainer Konten Utama -->
    <div class="container-fluid">
        <?php
        // Sertakan file koneksi database
        include_once "koneksi.php";

        // Tentukan total kamar
        $totalKamar = 35;

        // Hitung kamar yang terisi
        $resultKamarTerisi = mysqli_query($conn, "SELECT COUNT(*) as kamar_terisi FROM daftar_kamar");
        $kamarTerisi = mysqli_fetch_assoc($resultKamarTerisi)['kamar_terisi'];

        // Hitung kamar yang kosong
        $kamarKosong = $totalKamar - $kamarTerisi;
        ?>

        <!-- Baris untuk Menampilkan Informasi Kamar -->
        <div class="row justify-content-center">
            <div class="col-lg-9 offset-lg-2">
                <div class="col-lg-12 text-center mt-5 mb-5">
                    <!-- Tampilkan Heading dan Informasi Kamar -->
                    <h3 class="display-4">DAFTAR KAMAR</h3>
                    <p>Total Kamar: <?php echo $totalKamar; ?></p>
                    <p>Kamar Terisi: <?php echo $kamarTerisi; ?></p>
                    <p>Kamar Kosong: <?php echo $kamarKosong; ?></p>
                    <!-- Tautan untuk menambah data baru -->
                    <a href="index_kamar.php" class="tombol-tambah">Tambah Data</a>
                </div>

                <!-- Tampilkan Tabel Kamar -->
                <div class="table-responsive">
                    <table class="table table-striped mx-auto" style="width: 100%; text-align: center;">
                        <thead class="table-dark">
                            <th>No.</th>
                            <th>No Kamar</th>
                            <th>Lantai</th>
                            <th>Fasilitas</th>
                            <th>Harga Sewa</th>
                            <th>Opsi</th>
                        </thead>
                        <?php
                        // Ambil dan tampilkan data kamar dari database
                        include_once "koneksi.php";
                        $no = 1;
                        $data = $conn->query("SELECT * FROM daftar_kamar");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($d['no_kamar']); ?></td>
                                <td><?php echo htmlspecialchars($d['lantai']); ?></td>
                                <td><?php echo htmlspecialchars($d['fasilitas']); ?></td>
                                <td><?php echo htmlspecialchars($d['harga_sewa']); ?></td>
                                <!-- Tautan untuk mengedit dan menghapus data kamar -->
                                <td>
                                    <a href="edit_kamar.php?no_kamar=<?php echo $d['no_kamar']; ?>" class="tombol-edit">Edit</a>
                                    <a href="hapus_kamar.php?no_kamar=<?php echo $d['no_kamar']; ?>" class="tombol-hapus">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
