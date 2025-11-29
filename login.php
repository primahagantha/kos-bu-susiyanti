<?php
// Include file koneksi.php untuk menghubungkan ke database
include("koneksi.php");

$error_message = "";

// Cek apakah form sudah disubmit dan tombol login ditekan
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['login'])) {
    // Ambil nilai username dan password dari form
    $username = $_POST['name'];
    $password = $_POST['password'];

    // Cek koneksi ke database
    if ($conn) {
        // Gunakan Prepared Statement untuk mencegah SQL Injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Cek apakah ada hasil (user) dari query
        if ($result->num_rows > 0) {
            // Ambil data user dari hasil query
            $row = $result->fetch_assoc();
            $passwordrow = $row['password'];

            // Bandingkan password yang dimasukkan dengan password dari database
            if ($password === $passwordrow) {
                // Jika password cocok, buat sesi dan arahkan ke halaman dashboard
                session_start();
                $_SESSION['username'] = $username;
                header("Location: dashboard.php");
                exit();
            } else {
                // Jika password tidak cocok, set pesan kesalahan
                $error_message = "Username atau password salah!";
            }
        } else {
            // Jika user tidak ditemukan, set pesan kesalahan
            $error_message = "Username tidak ditemukan!";
        }
        $stmt->close();
    } else {
        // Jika koneksi ke database gagal
        $error_message = "Gagal terhubung ke database!";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
    body { 
        font-family: 'Poppins', sans-serif;
        background: url('bg.png') no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        padding: 20px;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
    }

    .container2 {
        width: 100%;
        max-width: 400px;
        background-color: rgba(200, 225, 240, 0.9); /* Use rgba to add transparency */
        box-shadow: 0 7px 10px rgba(0, 0, 0, 0.4);
        padding: 35px;
        border-radius: 10px;
        text-align: center;
    }

    .container2 h2 {
        margin-bottom: 20px; 
        font-size: 25px;
    }

    .form-group {
        margin-bottom: 22px; /* Add margin-bottom to create space between inputs */
        text-align: left;
        font-size: 13px;
    }


    .tombol-masuk {
        background-color: #286589;
            color: #fff;
            padding: 7px 18px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 50px;
        }

    /* Efek hover pada tombol */
    .tombol-masuk :hover {
        background-color: #F6F9FA;
            color: #286589;
    }

</style>

</head>
<body>
    <!-- login start -->
    <form action="" method="post" class="newaccount" novalidate="">
        <div class="container2">
            <h2>MASUK AKUN</h2>

            <!-- Input untuk nama pengguna -->
            <div class="form-group">
                <label for="name"><b>Nama Pengguna</b></label>
                <input id="name" type="text" class="form-control" name="name" >
            </div>

            <!-- Input untuk kata sandi -->
            <div class="form-group">
                <label for="password"><b>Kata sandi</b></label>
                <input id="password" type="password" class="form-control" name="password" >
            </div>
                
            <!-- Tombol masuk -->
            <button class="tombol-masuk" type="submit" name="login" value="Masuk">Masuk</button>
        </div>
    </form>
    <!-- login end -->

    <?php if (!empty($error_message)): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal Masuk',
            text: '<?php echo $error_message; ?>',
            confirmButtonColor: '#286589'
        });
    </script>
    <?php endif; ?>
</body>
</html>