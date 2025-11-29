
<?php include 'auth_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bagian kepala dokumen HTML -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Penambahan stylesheet dari Bootstrap -->
    <title>Kos Bu Susiyanti - Daftar Tagihan</title>
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
            color: #fff; /* Warna teks tombol saat dihover */
            transform: scale(1.05); /* Efek scaling saat dihover */
            text-decoration: none;
        }
        
        .tombol-edit:hover {
            background-color: #1a4a66;
        }
        
        .tombol-hapus:hover {
            background-color: #c82333;
        }

        /* Gaya untuk formulir pencarian */
        form {
          display: flex;
          justify-content: center;
          align-items: center;
          margin-bottom: 15px;
        }

        /* Gaya untuk input dan tombol pencarian */
        input[name="keyword"] {
          padding: 5px;
          margin-right: 5px;
          border: 1px solid #ccc;
          border-radius: 5px;
          color: #286589; /* Ganti warna teks sesuai keinginan Anda */
        }

        button.btn-primary {
          padding: 5px 15px;
          border: none;
          border-radius: 5px;
          background-color: #286589;
          color: #fff;
        }

        /* Gaya saat hover pada tombol pencarian */
        button.btn-primary:hover{
            background-color: #1a4a66;
            color: #fff;
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
                <!-- Kolom lebar 12 dengan penambahan margin pada bagian atas dan bawah -->
                <div class="col-lg-12 text-center mt-3 mb-3">
                  <!-- Formulir pencarian -->
                  <form action="" method="post">
                    <input type="text" name="keyword" placeholder="Cari No Kamar">
                    <button type="submit" class="btn btn-primary">Cari</button>
                  </form>
                </div>

                <!-- Kolom lebar 12 dengan teks yang berpusat, margin atas dan bawah -->
                <div class="col-lg-12 text-center mt-5 mb-5">
                    <!-- Judul halaman dengan gaya teks display-4 -->
                    <h3 class="display-4">DAFTAR TAGIHAN</h3>
                    <!-- Tombol untuk menambahkan data tagihan -->
                    <a href="index_tagihan.php" class="tombol-tambah"><i class="fas fa-plus"></i> Tambah Data</a>
                </div>
                
                <div class="table-responsive shadow-sm p-3 mb-5 bg-white rounded">
                    <!-- Kontainer responsif untuk tabel -->
                    <table class="table table-striped table-hover mx-auto" style="width: 100%; text-align: center;">
                        <!-- Tabel dengan gaya Bootstrap, striping, dan diatur rata tengah -->
                        <thead class="thead-dark">
                            <!-- Bagian kepala tabel dengan latar belakang gelap -->
                            <tr>
                                <th>No.</th>
                                <th>No Kamar</th>
                                <th>Jumlah Tagihan</th>
                                <th>Keterangan Pembayaran</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Koneksi ke database
                            include_once "koneksi.php";

                            // Cek apakah form pencarian telah di-submit
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $keyword = "%" . $_POST["keyword"] . "%";
                                $stmt = $conn->prepare("SELECT * FROM tagihan WHERE no_kamar LIKE ?");
                                $stmt->bind_param("s", $keyword);
                                $stmt->execute();
                                $data = $stmt->get_result();
                            } else {
                                $data = $conn->query("SELECT * FROM tagihan");
                            }

                            // Iterasi untuk menampilkan data pada tabel
                            while ($d = $data->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><?php echo $d['no']; ?></td>
                                    <td><?php echo htmlspecialchars($d['no_kamar']); ?></td>
                                    <td>Rp <?php echo number_format($d['jumlah_tagihan'], 0, ',', '.'); ?></td>
                                    <td><?php echo htmlspecialchars($d['keterangan_pembayaran']); ?></td>
                                    <td>
                                        <a href="edit_tagihan.php?no=<?php echo $d['no']; ?>" class="tombol-edit">Edit</a>
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
                text: "Data tagihan ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'hapus_tagihan.php?no=' + no;
                }
            })
        }
    </script>
</body>
</html>