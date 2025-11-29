<?php include 'auth_check.php'; ?>
<!-- Bagian: Deklarasi Jenis Dokumen -->
<!DOCTYPE html>
<html lang="en">

<!-- Bagian: Kepala Dokumen -->
<head>
    <!-- Setel pengaturan karakter dan tampilan responsif -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Judul Halaman -->
    <title>Dashboard</title>
    
    <!-- Sertakan gaya dari Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Gaya Internal -->
    <style>
        /* Setel properti awal untuk elemen body */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: flex-start;
            min-height: 100vh;
            transition: background-color 0.5s;
            background-image: url('1.jpg'); /* Ganti path dengan path ke gambar Anda */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            overflow-x: hidden;
        }

        /* Gaya untuk sidebar */
        .sidebar {
            background-color: #333;
            color: #C5DBE9;
            width: 280px;
            height: 100%;
            transition: all 0.3s ease;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar.hide {
            left: -280px;
        }

        /* Gaya untuk bagian atas sidebar */
        .top {
            font-size: 20px;
            color: #fff;
            text-align: center;
            line-height: 70px;
            background-image: linear-gradient(to right, #286589, #C5DBE9);
            font-family: 'Rowdies', sans-serif;
        }

        /* Pengaturan gaya untuk daftar menu sidebar */
        ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        ul a {
            display: block;
            line-height: 50px;
            font-size: 16px;
            color: #fff;
            padding-left: 20px;
            text-decoration: none;
            box-sizing: border-box;
            border-top: 1px solid rgba(6, 255, 251, 0.1);
            border-bottom: 1px solid rgba(125, 134, 146, 0.302);
            transition: all 0.3s ease;
        }

        li:hover a {
            padding-left: 30px;
            background: #efe7bc;
            color: rgb(0, 0, 0);
        }

        ul a i {
            margin-right: 10px;
        }

        /* Gaya untuk konten utama */
        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-left: 280px;
            padding: 20px;
            width: 100%;
            transition: margin-left 0.3s ease;
        }

        .content.expand {
            margin-left: 0;
        }

        /* Gaya untuk item grid pada konten utama */
        .grid-item {
            background-color: #AAB3B8;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 15px;
            text-align: center;
            transition: box-shadow 0.3s, transform 0.3s;
            font-size: 17px;
            border-radius: 10px;
            flex: 1 1 300px;
            max-width: 400px;
        }

        /* Gaya saat item grid dihover */
        .grid-item:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }

        /* Gaya untuk tombol "Lihat" */
        .btn-lihat {
            background-color: #286589;
            color: #fff;
            padding: 8px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 50px;
            margin-top: 10px;
        }

        /* Gaya saat tombol "Lihat" dihover */
        .btn-lihat:hover {
            background-color: #F6F9FA;
            color: #286589;
        }

        /* Toggle Button */
        .toggle-btn {
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1001;
            background: #286589;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            display: block;
        }

        /* Responsive Media Queries */
        @media (max-width: 768px) {
            .sidebar {
                left: -280px;
            }
            .sidebar.show {
                left: 0;
            }
            .content {
                margin-left: 0;
                padding-top: 60px;
            }
            .toggle-btn {
                display: block;
            }
        }
    </style>
</head>

<!-- Bagian: Tubuh Dokumen -->
<body>
    <!-- Toggle Button -->
    <button class="toggle-btn" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <!-- Bagian Atas Sidebar dengan Nama KOS BU SUSIYANTI -->
        <div class="top">
            KOS BU SUSIYANTI
        </div>
        
        <!-- Daftar Menu Sidebar -->
        <ul>
            <li><a class="#" href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a class="#" href="logout.php"><i class="fa fa-user-circle"></i> Log Out</a></li>
        </ul>
    </div>
    
    <!-- Konten Utama -->
    <div class="content">
        <!-- Grid Item Pertama untuk Daftar Pemilik -->
        <div class="grid-item">
            <h2>DAFTAR PEMILIK</h2>
            <button class="btn-lihat" onclick="location.href='daftar_pemilik.php'">Lihat</button>
        </div>

        <!-- Grid Item Kedua untuk Daftar Penyewa -->
        <div class="grid-item">
            <h2>DAFTAR PENYEWA</h2>
            <button class="btn-lihat" onclick="location.href='daftar_penyewa.php'">Lihat</button>
        </div>
        
        <!-- Grid Item Ketiga untuk Daftar Tagihan -->
        <div class="grid-item">
            <h2>DAFTAR TAGIHAN</h2>
            <button class="btn-lihat" onclick="location.href='daftar_tagihan.php'">Lihat</button>
        </div>
        
        <!-- Grid Item Keempat untuk Daftar Kamar Kost -->
        <div class="grid-item">
            <h2>DAFTAR KAMAR KOST</h2>
            <button class="btn-lihat" onclick="location.href='daftar_kamar.php'">Lihat</button>
        </div>
        
        <!-- Grid Item Kelima untuk Daftar Penjaga Kost -->
        <div class="grid-item">
            <h2>DAFTAR PENJAGA KOST</h2>
            <button class="btn-lihat" onclick="location.href='daftar_penjaga.php'">Lihat</button>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            var content = document.querySelector('.content');
            sidebar.classList.toggle('show');
            sidebar.classList.toggle('hide'); // Toggle hide class for desktop
            
            // Adjust content margin based on sidebar state
            if (window.innerWidth > 768) {
                if (sidebar.classList.contains('hide')) {
                    content.style.marginLeft = '0';
                } else {
                    content.style.marginLeft = '280px';
                }
            }
        }
    </script>
</body>

</html>
