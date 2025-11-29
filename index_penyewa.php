<?php include 'auth_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <title>Kos Bu Susiyanti - Tambah Penyewa</title>
    <link rel="icon" href="usu.png">

    <style>
        body {
            background-color: #dde0e3;
            font-family: 'Poppins', sans-serif;
        }

        .container-fluid {
            margin-top: 20px;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            margin-bottom: 50px;
        }

        h3 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            color: #333;
        }

        .btn-primary {
            background-color: #286589;
            border: none;
            padding: 10px 30px;
        }

        .btn-primary:hover {
            background-color: #1a4a66;
        }

        .btn-back {
            color: #286589;
            text-decoration: none;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn-back:hover {
            color: #1a4a66;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php include_once "sidebar.php"; ?>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="form-container">
                    <a href="daftar_penyewa.php" class="btn-back">
                        <i class="fas fa-arrow-left"></i> &lt;- Kembali
                    </a>
                    <h3>Tambah Data Penyewa</h3>
                    
                    <form action="tambah_penyewa.php" method="post">
                        <div class="form-group">
                            <label for="no">No.</label>
                            <input type="number" class="form-control" id="no" name="no" required placeholder="Masukkan Nomor">
                        </div>
                        
                        <div class="form-group">
                            <label for="nama_penyewa">Nama Penyewa</label>
                            <input type="text" class="form-control" id="nama_penyewa" name="nama_penyewa" required placeholder="Masukkan Nama Penyewa">
                        </div>
                        
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="lantai">Lantai</label>
                            <input type="number" class="form-control" id="lantai" name="lantai" required placeholder="Masukkan Lantai">
                        </div>

                        <div class="form-group">
                            <label for="no_kamar">No Kamar</label>
                            <input type="text" class="form-control" id="no_kamar" name="no_kamar" required placeholder="Masukkan No Kamar">
                        </div>

                        <div class="form-group">
                            <label for="no_hp">No HP</label>
                            <input type="text" class="form-control" id="no_hp" name="no_hp" required placeholder="Masukkan No HP">
                        </div>
                        
                        <div class="text-center mt-4">
                            <button type="submit" name="tambah" class="btn btn-primary btn-block">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>