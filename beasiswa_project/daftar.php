<?php
// Mendefinisikan nilai IPK minimum sebagai konstanta
define('IPK_SISTEM', 3.0); // Ganti nilainya jika ingin tes kondisi IPK < 3

// Fungsi untuk menghasilkan pilihan semester 1 sampai 8
function generateSemesterOptions() {
    $options = "";
    for ($i = 1; $i <= 8; $i++) {
        $options .= "<option value='$i'>$i</option>\n"; // Tambah pilihan semester ke dalam string
    }
    return $options; // Mengembalikan semua opsi semester
}

// Fungsi untuk menentukan apakah field harus di-disable (jika IPK < 3)
function isDisabled($ipk) {
    return $ipk < 3 ? 'disabled' : 'required'; // IPK < 3 maka field disabled, kalau tidak maka required
}

// Menyimpan nilai IPK dari konstanta
$ipk = IPK_SISTEM;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Beasiswa</title>

    <!-- Memuat CSS utama buatan sendiri -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Memuat Bootstrap offline tanpa mengubah style.css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <!-- Navigasi halaman -->
    <ul class="menu">
        <li><a href="pilihan.php">Pilihan Beasiswa</a></li>
        <li><a href="daftar.php" class="active">Daftar</a></li>
        <li><a href="hasil.php">Lihat Hasil</a></li>
    </ul>

    <!-- Judul halaman -->
    <h2>DAFTAR BEASISWA</h2>

    <!-- Kontainer form -->
    <div class="form-container">
        <fieldset>
            <legend>Registrasi Beasiswa</legend>

            <!-- Form pendaftaran -->
            <form action="proses_daftar.php" method="POST" enctype="multipart/form-data">

                <!-- Input nama -->
                <label>Masukkan Nama:</label>
                <input type="text" name="nama" required>

                <!-- Input email -->
                <label>Masukkan Email:</label>
                <input type="email" name="email" required>

                <!-- Input nomor HP -->
                <label>Nomor HP:</label>
                <input type="number" name="hp" required>

                <!-- Dropdown semester -->
                <label>Semester saat ini:</label>
                <select name="semester" required>
                    <?= generateSemesterOptions(); // Menampilkan opsi semester ?>
                </select>

                <!-- Input IPK, readonly karena berasal dari sistem -->
                <label>IPK Terakhir:</label>
                <input type="text" name="ipk" value="<?= $ipk ?>" readonly>

                <!-- Pilihan jenis beasiswa -->
                <label>Pilihan Beasiswa:</label>
                <select name="jenis_beasiswa" <?= isDisabled($ipk) ?>>
                    <option value="">-- Pilih Beasiswa --</option>
                    <option value="akademik">Beasiswa Akademik</option>
                    <option value="non-akademik">Beasiswa Non-Akademik</option>
                </select>

                <!-- Upload berkas -->
                <label>Upload Berkas Syarat:</label>
                <input type="file" name="berkas" accept=".pdf,.jpg,.zip" <?= isDisabled($ipk) ?>>

                <!-- Tombol aksi -->
                <div class="btn-group">
                    <!-- Tombol submit, nonaktif jika IPK < 3 -->
                    <button type="submit" name="submit" <?= ($ipk < 3) ? 'disabled' : '' ?>>Daftar</button>
                    <button type="reset">Batal</button>
                </div>
            </form>

            <!-- Pesan peringatan jika IPK tidak memenuhi syarat -->
            <?php if ($ipk < 3): ?>
                <p class="warning">* IPK di bawah 3.0, tidak memenuhi syarat untuk mendaftar beasiswa.</p>
            <?php endif; ?>
        </fieldset>
    </div>

    <!-- Memuat Bootstrap JS offline -->
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
