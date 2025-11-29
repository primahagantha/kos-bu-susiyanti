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
            background-color: #fff; /* Changed to white for better contrast */
        }

        /* Pusatkan konten di dalam sel tabel */
        th, td {
            vertical-align: middle;
            text-align: center;
        }

        /* Gaya untuk tombol "Tambah Data", "Edit", dan "Hapus" */
        .tombol-tambah {
            display: inline-block;
            padding: 8px 15px; /* Increased padding */
            margin: 4px;
            color: #fff;
            border: 2px solid #A61212;
            background-color: #A61212;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 14px; /* Increased font size */
            text-decoration: none;
        }

        .tombol-edit,
        .tombol-hapus {
            display: inline-block;
            padding: 5px 10px;
            margin: 2px;
            color: #fff;
            border-radius: 5px;
            font-size: 12px;
            text-decoration: none;
        }

        .tombol-edit {
            background-color: #286589;
            border: 1px solid #286589;
        }

        .tombol-hapus {
            background-color: #dc3545;
            border: 1px solid #dc3545;
        }

        .tombol-tambah:hover,
        .tombol-edit:hover,
        .tombol-hapus:hover {
            color: #fff;
            transform: scale(1.05);
            text-decoration: none;
        }
        
        .tombol-edit:hover {
            background-color: #1a4a66;
        }
        
        .tombol-hapus:hover {
            background-color: #c82333;
        }
    </style>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<!-- Bagian: Tubuh Dokumen -->
<body style="background-color: #dde0e3;">
    <!-- Sertakan sidebar menggunakan PHP -->
    <?php include_once "sidebar.php"; ?>

    <!-- Kontainer Konten Utama -->
    <div class="container-fluid">
        <!-- Baris untuk Menyusun Konten Tengah secara Horizontal -->
        <div class="row justify-content-center">
            <!-- Kolom untuk Menyusun Konten -->
            <div class="col-lg-10 col-md-12"> <!-- Adjusted column width for better responsiveness -->
                <!-- Div untuk Menyusun Konten Pusat dengan Margin dan Padding -->
                <div class="col-lg-12 text-center mt-5 mb-5">
                    <!-- Heading Display-4 untuk Judul "DAFTAR PEMILIK" -->
                    <h3 class="display-4">DAFTAR PEMILIK</h3>
                    <!-- Tautan untuk Menambah Data Baru -->
                    <a href="index_pemilik.php" class="tombol-tambah"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>

                <!-- Div untuk Menyusun Tabel Responsif -->
                <div class="table-responsive shadow-sm p-3 mb-5 bg-white rounded">
                    <!-- Tabel dengan Bootstrap Styling dan Aturan Penyusunan -->
                    <table class="table table-striped table-hover mx-auto" style="width: 100%; text-align: center;">
                        <!-- Baris Kepala Tabel dengan Warna Latar Dark -->
                        <thead class="thead-dark">
                            <tr>
                                <th>No.</th>
                                <th>Nama Pemilik</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>

                        <!-- Loop untuk Menampilkan Data Pemilik dari Database -->
                        <tbody>
                        <?php
                            // Buat koneksi ke database
                            include_once "koneksi.php";

                            // Ambil data dari tabel nama_pemilik
                            $data = $conn->query("SELECT * FROM nama_pemilik");

                            // Loop untuk menampilkan setiap baris data
                            while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <!-- Baris Tabel untuk Setiap Data -->
                            <tr>
                                <td><?php echo $d['no']; ?></td>
                                <td><?php echo htmlspecialchars($d['nama_pemilik']); ?></td>
                                <td><?php echo htmlspecialchars($d['alamat']); ?></td>
                                <td><?php echo htmlspecialchars($d['no_hp']); ?></td>
                                
                                <!-- Kolom Opsi dengan Tautan Edit dan Hapus -->
                                <td>
                                    <a href="edit_pemilik.php?no=<?php echo $d['no']; ?>" class="tombol-edit">Edit</a>
                                    <a href="#" onclick="confirmDelete('<?php echo $d['no']; ?>')" class="tombol-hapus">Hapus</a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(no) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data pemilik ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'hapus_pemilik.php?no=' + no;
                }
            })
        }
    </script>
</body>

</html>
