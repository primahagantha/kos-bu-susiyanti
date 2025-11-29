
<?php include 'auth_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bagian kepala dokumen HTML -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Penambahan stylesheet dari Bootstrap -->
    <title>Kos Bu Susiyanti</title>
    <!-- Judul halaman web -->
    <link rel="icon" href="usu.png">
    <!-- Penambahan ikon pada tab browser -->
    <style>
        /* Gaya CSS internal untuk menentukan tampilan halaman */
        h3.display-4 {
            font-size: 2.0rem; /* Ukuran font untuk judul halaman */
        }

        table {
            text-align: center;
            font-size: 0.87rem; /* Ukuran font untuk isi tabel */
            background-color: #fff; /* Warna latar belakang tabel */
        }

        th, td {
            vertical-align: middle;
            text-align: center;
        }

        .tombol-tambah{
            display: inline-block;
            padding: 8px 15px;
            margin: 4px;
            color: #fff;
            border: 2px solid #A61212;
            background-color: #A61212;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 14px;
            text-decoration: none;
        }

        /* Menambahkan gaya pada tombol "Tambah Data", "Edit", dan "Hapus" */
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

<body style="background-color: #dde0e3;">
    <!-- Tubuh dari dokumen HTML dengan latar belakang berwarna #dde0e3 -->
    <?php include_once "sidebar.php"; ?>
    <!-- Penyertaan (inclusion) konten dari file sidebar.php -->

    <div class="container-fluid">
        <!-- Container fluid untuk menyusun layout halaman -->
        <div class="row justify-content-center">
            <!-- Baris (row) yang diatur menjadi berada di tengah halaman -->
            <div class="col-lg-10 col-md-12">
                <!-- Kolom lebar 9 dengan offset 2 (menggeser posisi kolom) -->
                <div class="col-lg-12 text-center mt-5 mb-5">
                    <!-- Kolom lebar 12 dengan teks yang berpusat, margin atas dan bawah -->
                    <h3 class="display-4">DAFTAR PENJAGA</h3>
                    <!-- Judul halaman dengan gaya teks display-4 -->
                    <a href="index_penjaga.php" class="tombol-tambah"><i class="fas fa-plus"></i> Tambah Data</a>
                    <!-- Tombol untuk menambahkan data penjaga -->
                </div>
                <div class="table-responsive shadow-sm p-3 mb-5 bg-white rounded">
                    <!-- Kontainer responsif untuk tabel -->
                    <table class="table table-striped table-hover mx-auto" style="width: 100%; text-align: center;">
                        <!-- Tabel dengan gaya Bootstrap, striping, dan diatur rata tengah -->
                        <thead class="thead-dark">
                            <!-- Bagian kepala tabel dengan latar belakang gelap -->
                            <th>No.</th>
                            <th>Nama Penjaga</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Jadwal Kerja</th>
                            <th>Opsi</th>
                            <!-- Kolom-kolom pada bagian kepala tabel -->
                        </thead>
                        <?php
                        include_once "koneksi.php";
                        $data = $conn->query("SELECT * FROM nama_penjaga");
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <!-- Baris data dalam tabel -->
                                <td><?php echo $d['no']; ?></td>
                                <td><?php echo htmlspecialchars($d['nama_penjaga']); ?></td>
                                <td><?php echo htmlspecialchars($d['no_hp']); ?></td>
                                <td><?php echo htmlspecialchars($d['jenis_kelamin']); ?></td>
                                <td><?php echo htmlspecialchars($d['jadwal_kerja']); ?></td>
                                <!-- Kolom-kolom pada baris data -->
                                <td>
                                    <a href="edit_penjaga.php?no=<?php echo $d['no']; ?>" class="tombol-edit">Edit</a>
                                    <a href="#" onclick="confirmDelete('<?php echo $d['no']; ?>')" class="tombol-hapus">Hapus</a>
                                    <!-- Tombol edit dan hapus untuk setiap baris data -->
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <!-- Penutup tabel -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(no) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data penjaga ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'hapus_penjaga.php?no=' + no;
                }
            })
        }
    </script>
</body>
</html>
