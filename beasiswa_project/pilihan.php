<!DOCTYPE html>
<html>
<head>
    <title>Pilihan Beasiswa</title> <!-- Judul halaman browser -->

    <!-- Memuat file CSS Bootstrap untuk tampilan modern -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Menghubungkan ke file CSS eksternal buatan sendiri -->
    <link rel="stylesheet" href="style.css">

    <!-- CSS tambahan khusus untuk halaman ini -->
    <style>
        /* Atur font dan warna latar belakang halaman */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f4f8;
            margin: 0;
            padding: 0;
        }

        /* Gaya untuk menu navigasi horizontal */
        .menu {
            list-style: none;               /* Hilangkan bullet bawaan */
            padding: 10px 20px;             /* Spasi dalam menu */
            background-color: #3498db;      /* Warna biru */
            display: flex;                  /* Agar menu sejajar */
            gap: 20px;                      /* Jarak antar item */
        }

        /* Setiap item menu tampil inline */
        .menu li {
            display: inline;
        }

        /* Gaya link dalam menu */
        .menu a {
            text-decoration: none;          /* Hilangkan garis bawah */
            color: white;                   /* Warna teks putih */
            font-weight: bold;              /* Tebalkan teks */
        }

        /* Link aktif (halaman sedang dibuka) diberi garis bawah putih */
        .menu a.active {
            border-bottom: 2px solid white;
        }

        /* Gaya judul utama */
        h2 {
            text-align: center;             /* Tengah halaman */
            margin-top: 40px;
            color: #2c3e50;
        }

        /* Container utama kotak beasiswa */
        .box {
            background-color: white;        /* Latar putih */
            padding: 25px 30px;             /* Spasi dalam box */
            border-radius: 12px;            /* Sudut membulat */
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);  /* Bayangan halus */
            max-width: 600px;               /* Lebar maksimal */
            margin: 30px auto;              /* Tengah halaman */
        }

        /* Subjudul dalam box */
        .box h3 {
            margin-top: 0;
            color: #34495e;
            font-size: 20px;
        }

        /* Hilangkan bullet di daftar beasiswa */
        .scholarship-list {
            list-style: none;
            padding: 0;
        }

        /* Gaya setiap item beasiswa */
        .scholarship-list li {
            margin-bottom: 15px;
            padding: 12px 15px;
            background-color: #ecf0f1;              /* Abu terang */
            border-left: 5px solid #3498db;         /* Strip biru di kiri */
            border-radius: 6px;
        }

        /* Gaya nama beasiswa */
        .scholarship-title {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        /* Gaya deskripsi/syarat beasiswa */
        .scholarship-requirement {
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>

    <!-- Menu navigasi antar halaman -->
    <ul class="menu">
        <!-- Halaman aktif diberi class 'active' -->
        <li><a href="pilihan.php" class="active">Pilihan Beasiswa</a></li>
        <li><a href="daftar.php">Daftar</a></li>
        <li><a href="hasil.php">Lihat Hasil</a></li>
    </ul>

    <!-- Judul utama halaman -->
    <h2>Beasiswa & Syarat</h2>

    <!-- Kotak utama berisi daftar beasiswa -->
    <div class="box">
        <h3>Daftar Beasiswa yang Dapat Dipilih:</h3>

        <ul class="scholarship-list">
            <!-- Beasiswa Akademik -->
            <li>
                <span class="scholarship-title">Beasiswa Akademik</span>
                <span class="scholarship-requirement">Minimal IPK: 3.4</span>
            </li>

            <!-- Beasiswa Non-Akademik -->
            <li>
                <span class="scholarship-title">Beasiswa Non-Akademik</span>
                <span class="scholarship-requirement">Minimal IPK: 3.0 dan aktif berorganisasi</span>
            </li>
        </ul>
    </div>

    <!-- Memuat file JavaScript Bootstrap (offline) -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
