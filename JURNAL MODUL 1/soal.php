<?php
// Selalu letakkan session_start() di baris paling atas
session_start();

// =========================================================================
// TUGAS JURNAL PRAKTIKUM - PEMROGRAMAN WEB
// Sistem Pendaftaran Calon Asisten Praktikum Laboratorium
// =========================================================================
// Nama  : Muhammad Toha Ashura
// NIM   : 102042530010
// Kelas : S1SI-25-03
// =========================================================================

// Daftar mata kuliah praktikum
$daftar_matkul = [
    "Algoritma dan Pemrograman",
    "Analisis dan Perancangan Sistem Informasi",
    "Arsitektur Enterprise",
    "Data Warehouse dan Business Intelligence",
    "Komputasi Awan",
    "Pemodelan Proses Bisnis",
    "Pengantar Sistem Informasi",
    "Pengembangan Aplikasi Bergerak",
    "Pengembangan Aplikasi Website",
    "Pengembangan UI Lanjut",
    "Proyek Perangkat Lunak",
    "Sistem Enterprise",
    "Sistem Informasi Akuntansi",
    "Sistem Operasi"
];

// ********************** NOMOR 1 **********************
// Inisialisasi variabel input dan pesan error
$nama = $whatsapp = $email = $matkul = $motivasi = "";
$namaErr = $waErr = $emailErr = $matkulErr = $motivasiErr = "";

// Mode tampilan default adalah form
$mode = "form";

// Cek apakah tombol "Lihat Data Pendaftar" / mode ID Card diakses
if (isset($_GET['page']) && $_GET['page'] === 'id_card') {
    if (!empty($_SESSION['data_pendaftar'])) {
        $nama = $_SESSION['data_pendaftar']['nama'];
        $whatsapp = $_SESSION['data_pendaftar']['whatsapp'];
        $email = $_SESSION['data_pendaftar']['email'];
        $matkul = $_SESSION['data_pendaftar']['matkul'];
        $motivasi = $_SESSION['data_pendaftar']['motivasi'];
        $mode = "id_card";
    }
}

// Proses pemrosesan Form saat tombol submit diklik
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // ********************** NOMOR 2 **********************
    // Tangkap & Validasi Nama Lengkap
    $nama = trim($_POST["nama_lengkap"] ?? "");
    if (empty($nama)) {
        $namaErr = "Nama lengkap wajib diisi!";
    } elseif (!preg_match("/^[a-zA-Z\s]*$/", $nama)) {
        $namaErr = "Nama hanya boleh berisi huruf dan spasi!";
    }

    // ********************** NOMOR 3 **********************
    // Tangkap & Validasi Nomor WhatsApp
    $whatsapp = trim($_POST["no_whatsapp"] ?? "");
    if (empty($whatsapp)) {
        $waErr = "Nomor WhatsApp wajib diisi!";
    } elseif (!preg_match("/^(0|62)[0-9]*$/", $whatsapp)) {
        $waErr = "Nomor WhatsApp harus angka dan diawali 0 atau 62!";
    }

    // ********************** NOMOR 4 **********************
    // Tangkap & Validasi Email Institusi
    $email = trim($_POST["email_institusi"] ?? "");
    if (empty($email)) {
        $emailErr = "Email institusi wajib diisi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format email tidak valid!";
    }

    // ********************** NOMOR 5 **********************
    // Tangkap & Validasi Mata Kuliah
    $matkul = trim($_POST["mata_kuliah"] ?? "");
    if (empty($matkul)) {
        $matkulErr = "Mata kuliah praktikum wajib dipilih!";
    }

    // ********************** NOMOR 6 **********************
    // Tangkap & Validasi Motivasi
    $motivasi = trim($_POST["motivasi"] ?? "");
    if (empty($motivasi)) {
        $motivasiErr = "Motivasi mendaftar wajib diisi!";
    }

    // ********************** NOMOR 7 & 8 **********************
    // Jika seluruh error kosong, simpan ke session dan ubah mode ke id_card
    if (empty($namaErr) && empty($waErr) && empty($emailErr) && empty($matkulErr) && empty($motivasiErr)) {
        $_SESSION['data_pendaftar'] = [
            'nama' => $nama,
            'whatsapp' => $whatsapp,
            'email' => $email,
            'matkul' => $matkul,
            'motivasi' => $motivasi
        ];
        
        $mode = "id_card";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Calon Asisten Praktikum</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <img src="logo.png" alt="Logo" class="logo">

        <?php if ($mode === "id_card"): ?>
            <!-- TAMPILAN KARTU REGISTRASI / ID CARD (BERHASIL) -->
            <h2>Kartu Registrasi</h2>
            <p class="subtitle">Calon Asisten Praktikum Laboratorium</p>
            
            <div style="margin: 20px 0; color: #2e7d32; font-weight: bold; font-size: 14px;">
                Berhasil! Data pendaftaran telah diterima.
            </div>

            <div style="text-align: left; margin: 20px 0; font-size: 14px; line-height: 1.8;">
                <p><strong>Nama Lengkap:</strong> <?php echo htmlspecialchars($nama); ?></p>
                <p><strong>No. WhatsApp:</strong> <?php echo htmlspecialchars($whatsapp); ?></p>
                <p><strong>Email Institusi:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><strong>Mata Kuliah:</strong> <?php echo htmlspecialchars($matkul); ?></p>
                <p><strong>Motivasi:</strong> <?php echo htmlspecialchars($motivasi); ?></p>
            </div>

            <div style="margin-top: 15px;">
                <span style="background-color: #e8f5e9; color: #2e7d32; padding: 6px 14px; border-radius: 12px; font-size: 12px; font-weight: bold;">
                    Pendaftaran Berhasil
                </span>
            </div>

            <div class="button-container" style="margin-top: 20px;">
                <a href="soal.php" style="display: block; text-align: center; text-decoration: none; background-color: #5c3bde; color: white; padding: 10px; border-radius: 8px; font-weight: bold;">
                    Kembali ke Form
                </a>
            </div>

            <p style="font-size: 11px; color: #888; margin-top: 15px;">
                Nomor Registrasi: REG-<?php echo rand(100000, 999999); ?> - Dicetak otomatis oleh sistem
            </p>

        <?php else: ?>
            <!-- TAMPILAN FORM INPUT -->
            <h2>Pendaftaran Asisten Praktikum</h2>
            <p class="subtitle">Laboratorium Enterprise Application Development</p>

            <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && (!empty($namaErr) || !empty($waErr) || !empty($emailErr) || !empty($matkulErr) || !empty($motivasiErr))): ?>
                <div style="background-color: #ffebee; color: #c62828; padding: 10px; border-radius: 6px; margin-bottom: 15px; font-size: 13px;">
                    <strong>Pendaftaran gagal!</strong> Harap perbaiki data yang salah.
                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                
                <!-- INPUT 1: NAMA LENGKAP -->
                <div class="form-group">
                    <label>Nama Lengkap <span class="required">*</span></label>
                    <input type="text" name="nama_lengkap" placeholder="Contoh: Budi Santoso" value="<?php echo htmlspecialchars($nama); ?>">
                    <?php if (!empty($namaErr)): ?>
                        <span class="error" style="color: red; font-size: 13px; display: block; margin-top: 5px; font-weight: bold;">
                            * <?php echo $namaErr; ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- INPUT 2: NOMOR WHATSAPP -->
                <div class="form-group">
                    <label>Nomor WhatsApp <span class="required">*</span></label>
                    <input type="text" name="no_whatsapp" placeholder="Contoh: 081234567890" value="<?php echo htmlspecialchars($whatsapp); ?>">
                    <?php if (!empty($waErr)): ?>
                        <span class="error" style="color: red; font-size: 13px; display: block; margin-top: 5px; font-weight: bold;">
                            * <?php echo $waErr; ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- INPUT 3: EMAIL INSTITUSI -->
                <div class="form-group">
                    <label>Email Institusi <span class="required">*</span></label>
                    <input type="text" name="email_institusi" placeholder="Contoh: nama@student.telkomuniversity.ac.id" value="<?php echo htmlspecialchars($email); ?>">
                    <?php if (!empty($emailErr)): ?>
                        <span class="error" style="color: red; font-size: 13px; display: block; margin-top: 5px; font-weight: bold;">
                            * <?php echo $emailErr; ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- INPUT 4: MATA KULIAH -->
                <div class="form-group">
                    <label>Pilihan Mata Kuliah Praktikum <span class="required">*</span></label>
                    <select name="mata_kuliah">
                        <option value="">-- Pilih Mata Kuliah --</option>
                        <?php foreach ($daftar_matkul as $m): ?>
                            <option value="<?php echo htmlspecialchars($m); ?>" <?php echo ($matkul === $m) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($m); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (!empty($matkulErr)): ?>
                        <span class="error" style="color: red; font-size: 13px; display: block; margin-top: 5px; font-weight: bold;">
                            * <?php echo $matkulErr; ?>
                        </span>
                    <?php endif; ?>
                </div>

                <!-- INPUT 5: MOTIVASI -->
                <div class="form-group">
                    <label>Motivasi Mendaftar <span class="required">*</span></label>
                    <textarea name="motivasi" rows="4" placeholder="Tuliskan motivasi kamu..."><?php echo htmlspecialchars($motivasi); ?></textarea>
                    <?php if (!empty($motivasiErr)): ?>
                        <span class="error" style="color: red; font-size: 13px; display: block; margin-top: 5px; font-weight: bold;">
                            * <?php echo $motivasiErr; ?>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="button-container" style="margin-top: 15px;">
                    <button type="submit">Daftar Sekarang</button>
                </div>

            </form>
        <?php endif; ?>

    </div>

</body>
</html>

// Cek apakah tombol "Lihat Data Pendaftar" diklik
if (isset($_GET['page']) && $_GET['page'] === 'id_card') {
    if (!empty($_SESSION['data_pendaftar'])) {
        $nama = $_SESSION['data_pendaftar']['nama'];
        $whatsapp = $_SESSION['data_pendaftar']['whatsapp'];
        $email = $_SESSION['data_pendaftar']['email'];
        $matkul = $_SESSION['data_pendaftar']['matkul'];
        $motivasi = $_SESSION['data_pendaftar']['motivasi'];
        $mode = "id_card";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // **********************  2  **************************  
    // - Tangkap nilai dari form (Lihat atribut name="nama_lengkap" pada form di Task 7)
    // - Validasi agar nama tidak boleh kosong
    // - Validasi agar nama hanya berupa huruf (Hint : gunakan fungsi preg_match)
    // silakan taruh kode kalian di bawah



    // **********************  3  **************************  
    // - Tangkap nilai dari form (Lihat atribut name="no_whatsapp" pada form di Task 7)
    // - Validasi agar nomor whatsapp tidak boleh kosong
    // - Validasi agar nomor whatsapp diawali '0' atau '62' (Hint : gunakan fungsi substr)
    // silakan taruh kode kalian di bawah


    // **********************  4  **************************  
    // - Tangkap nilai dari form (Lihat atribut name="email_institusi" pada form di Task 7)
    // - Memeriksa apakah email kosong
    // - Memeriksa apakah format email valid (Hint : gunakan fungsi filter_var)
    // silakan taruh kode kalian di bawah


    // **********************  5  **************************  
    // - Tangkap nilai dari form (Lihat atribut name="pilihan_matkul" pada form di Task 7)
    // - Validasi agar pilihan mata kuliah tidak boleh kosong
    // silakan taruh kode kalian di bawah


    // **********************  6  **************************  
    // - Tangkap nilai dari form (Lihat atribut name="motivasi" pada form di Task 7)
    // - Validasi agar motivasi tidak boleh kosong
    // silakan taruh kode kalian di bawah


    // **********************  8  **************************  
    // Cek jika seluruh error kosong (pendaftaran berhasil):
    // - Simpan data pendaftar ke dalam $_SESSION['data_pendaftar']
    // - Ubah $mode menjadi "id_card" agar form berganti ke tampilan Kartu Registrasi
    // silakan taruh kode kalian di bawah

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Calon Asisten Praktikum</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php if ($mode === "id_card") { ?>

    <!-- ==================== MODE ID CARD ==================== -->
    <div class="id-card">
        <img src="logo.png" alt="Logo" class="logo">
        <div class="id-card-header">
            <h2>Kartu Registrasi</h2>
            <p>Calon Asisten Praktikum Laboratorium</p>
        </div>

        <div class="alert alert-success">
            <strong>Berhasil!</strong> Data pendaftaran telah diterima.
        </div>

        <div class="id-card-body">
            <!-- **********************  9  ************************** -->
            <!-- Tampilkan data pendaftar ke dalam baris-baris ID Card di bawah ini -->
            <div class="id-card-row">
                <span class="id-card-label">Nama Lengkap</span>
                <span class="id-card-value"><?php echo htmlspecialchars($nama); ?></span>
            </div>

            <div class="id-card-row">
                <span class="id-card-label">No. WhatsApp</span>
                <span class="id-card-value"></span>
            </div>

            <hr class="id-card-divider">

            <div class="id-card-row">
                <span class="id-card-label">Email Institusi</span>
                <span class="id-card-value"></span>
            </div>

            <div class="id-card-row">
                <span class="id-card-label">Mata Kuliah</span>
                <span class="id-card-value"><?php echo htmlspecialchars($matkul); ?></span>
            </div>

            <hr class="id-card-divider">

            <div class="id-card-row">
                <span class="id-card-label">Motivasi</span>
                <span class="id-card-value"><?php echo nl2br(htmlspecialchars($motivasi)); ?></span>
            </div>

            <div style="text-align: center; margin-top: 18px;">
                <span class="id-card-badge">Pendaftaran Berhasil</span>
            </div>
        </div>

        <a href="?page=form" class="btn-kembali">Kembali ke Form</a>

        <div class="id-card-footer">
            Nomor Registrasi: REG-<?php echo strtoupper(substr(md5(time()), 0, 8)); ?> &bull; Dicetak otomatis oleh sistem
        </div>
    </div>

    <?php } else { ?>

    <!-- ==================== MODE FORM ==================== -->
    <div class="container">
        <img src="logo.png" alt="Logo" class="logo">
        <h2>Pendaftaran Asisten Praktikum</h2>
        <p class="subtitle">Laboratorium Enterprise Application Development</p>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && (!empty($namaErr) || !empty($waErr) || !empty($emailErr) || !empty($matkulErr) || !empty($motivasiErr))) { ?>
        <div class="alert alert-danger">
            <strong>Pendaftaran gagal!</strong> Harap perbaiki data yang salah.
        </div>
        <?php } ?>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <!-- **********************  7  ************************** -->
            <!-- Tambahkan value di tiap input untuk menampilkan kembali data setelah submit (retaining input) -->
            <!-- Hint : value pada input form harus berisi variabel yang menyimpan data input -->

            <div class="form-group">
                <label>Nama Lengkap <span class="required">*</span></label>
                <input type="text" name="nama_lengkap" placeholder="Contoh: Budi Santoso" value="<?php echo $nama; ?>">
                <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label>Nomor WhatsApp <span class="required">*</span></label>
                <input type="number" name="no_whatsapp" placeholder="Contoh: 081234567890">
                <span class="error"><?php echo $waErr ? "* $waErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label>Email Institusi <span class="required">*</span></label>
                <input type="email" name="email_institusi" placeholder="Contoh: budi@university.ac.id">
                <span class="error"><?php echo $emailErr ? "* $emailErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label>Pilihan Mata Kuliah Praktikum <span class="required">*</span></label>
                <select name="pilihan_matkul">
                    <option value="">-- Pilih Mata Kuliah --</option>
                    <?php foreach ($daftar_matkul as $mk) { ?>
                        <option value="<?php echo $mk; ?>" <?php echo ($matkul == $mk) ? 'selected' : ''; ?>>
                            <?php echo $mk; ?>
                        </option>
                    <?php } ?>
                </select>
                <span class="error"><?php echo $matkulErr ? "* $matkulErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label>Motivasi Mendaftar <span class="required">*</span></label>
                <textarea name="motivasi" placeholder="Tuliskan alasan kamu ingin menjadi asisten praktikum..."><?php echo $motivasi; ?></textarea>
                <span class="error"><?php echo $motivasiErr ? "* $motivasiErr" : ""; ?></span>
            </div>

            <div class="button-container">
                <button type="submit">Daftar Sekarang</button>
                <?php if (!empty($_SESSION['data_pendaftar'])) { ?>
                    <a href="?page=id_card" class="btn-lihat-data">Lihat Data Pendaftar</a>
                <?php } ?>
            </div>
        </form>
    </div>

    <?php } ?>

</body>
</html>
