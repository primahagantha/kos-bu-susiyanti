<?php include 'auth_check.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Menggunakan Bootstrap untuk tata letak dan tampilan yang responsif -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Menggunakan font Poppins dari Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">

    <title>Kos Bu Susiyanti - Tambah Kamar</title>
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
                    <a href="daftar_kamar.php" class="btn-back">
                        <i class="fas fa-arrow-left"></i> &lt;- Kembali
                    </a>
                    <h3>Tambah Data Kamar</h3>
                    
                    <form action="tambah_kamar.php" method="post">
                        <div class="form-group">
                            <label for="no_kamar">No Kamar</label>
                            <input type="text" class="form-control" id="no_kamar" name="no_kamar" required placeholder="Masukkan No Kamar">
                        </div>
                        
                        <div class="form-group">
                            <label for="lantai">Lantai</label>
                            <input type="number" class="form-control" id="lantai" name="lantai" required placeholder="Masukkan Lantai">
                        </div>
                        
                        <div class="form-group">
                            <label for="fasilitas">Fasilitas</label>
                            <input type="text" class="form-control" id="fasilitas" name="fasilitas" required placeholder="Masukkan Fasilitas">
                        </div>
                        
                        <div class="form-group">
                            <label for="harga_sewa">Harga Sewa</label>
                            <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" required placeholder="Masukkan Harga Sewa">
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
