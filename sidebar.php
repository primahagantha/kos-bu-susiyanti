    <!-- Tambahkan link ke file Bootstrap CSS dan beberapa font -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-3B6NwesSXE7YJlcLI9RpRqGf2p/EgVH8BgoKTaUrmKNDkHPStTQ3EyoYjCGXaOTS" crossorigin="anonymous">

    <!-- Tambahkan gaya CSS internal untuk tata letak dan desain -->
    <style>
        /* Reset body style to avoid conflicts */
        /* .container-fluid styles to handle sidebar offset */
        .container-fluid {
            padding: 20px;
            font-family: 'Poppins', sans-serif;
            transition: margin-left 0.3s ease;
            margin-left: 280px; /* Sidebar width */
            width: auto; /* Allow it to fill remaining space */
        }

        /* Menambahkan style untuk tabel */
        .table-responsive {
            margin-top: 20px; /* Atur margin sesuai kebutuhan */
            margin-left: auto;
            margin-right: auto;
            overflow-x: auto;
        }

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
            display: none; /* Hidden by default (desktop) */
        }

        /* Media Query for Mobile Devices */
        @media (max-width: 768px) {
            .sidebar {
                left: -280px;
            }
            .sidebar.show {
                left: 0;
            }
            .container-fluid {
                margin-left: 0;
                padding-top: 60px;
            }
            .toggle-btn {
                display: block; /* Show on mobile */
            }
        }
        
        /* Desktop specific adjustments */
        @media (min-width: 769px) {
             /* Desktop styles if needed */
        }

        .top {
            font-size: 20px;
            color: #fff;
            text-align: center;
            line-height: 70px;
            background-image: linear-gradient(to right, #286589, #C5DBE9);
            font-family: 'Rowdies', sans-serif; /* Perbarui baris ini */
        }

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
    </style>
</head>

<body>
    <!-- Toggle Button -->
    <button class="toggle-btn" onclick="toggleSidebar()">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Sidebar sebagai navigasi -->
    <div class="sidebar" id="sidebar">
        <div class="top">
            <i class="fi fi-home"></i> KOS BU SUSIYANTI
        </div>

        <!-- Daftar navigasi -->
        <ul>
            <li><a class="#" href="dashboard.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a class="#" href="daftar_pemilik.php"><i class="fa fa-home"></i> Daftar Pemilik</a></li>
            <li><a class="#" href="daftar_penyewa.php"><i class="fa fa-shopping-basket"></i> Daftar Penyewa</a></li>
            <li><a class="#" href="daftar_penjaga.php"><i class="fa fa-shopping-bag"></i> Daftar Penjaga Kost</a></li>
            <li><a class="#" href="daftar_kamar.php"><i class="fa fa-user-circle"></i> Daftar Kamar Kost</a></li>
            <li><a class="#" href="daftar_tagihan.php"><i class="fa fa-user-circle"></i> Daftar Tagihan</a></li>
            <li><a class="#" href="logout.php"><i class="fa fa-user-circle"></i> Log Out</a></li>
        </ul>
    </div>

    <script>
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            var content = document.querySelector('.container-fluid');
            sidebar.classList.toggle('show');
            
            // Logic for mobile toggle
            // If we want desktop toggle, we need to handle margin-left of container-fluid
        }
    </script>
