<!DOCTYPE html>
<html>
<head>
    <!-- Menyertakan library Font Awesome untuk ikon. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Data Peminjaman</title> <!-- Menentukan judul halaman yang ditampilkan di tab browser -->
    <style>
    :root {
        --ij: #55b8ff; /* Variabel warna untuk desain */
        --blue: #0048ac; /* Variabel warna untuk desain */
        --gradient: linear-gradient(90deg, var(--ij), var(--blue)); /* Variabel gradien untuk latar belakang */
    }

    /* Mengatur gaya scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }
    ::-webkit-scrollbar-track {
        background: #333;
    }
    ::-webkit-scrollbar-thumb {
        background: #fff;
        border-radius: 5px;
    }

    header {
        display: flex;                      /* display flex */
        align-items: center;
        justify-content: space-between;     /* Menyebarkan item flex dengan ruang di antara mereka. */
        padding: 10px;
        border-bottom: 1px solid rgb(255, 255, 255);
        position: relative;                 /* posisi relatif */
        z-index: 1000;                      /* Menetapkan z-index untuk mengatur lapisan elemen. */
    }

    header .logo {
        font-size: 30px;
        color: #fff;
        font-weight: bold;
        text-decoration: none;
    }

    header .logo span {
        color: var(--blue);
    }
    
    header .navbar a {
        margin-left: 20px;                 /* margin kiri 20px */
        font-size: 25px;
        color:#fff;
        text-decoration: none;
    }

    /* mengatur gaya elemen id menu */
    #menu {
        font-size: 25px;
        padding: 5px 10px;
        border-radius: 3px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        cursor: pointer;
        display: none;                      /* tampilan elemen tidak terlihat */
    }

    body {
        background: var(--gradient); /* Menggunakan gradien sebagai latar belakang */
        padding: 16px 5%;
        font-family: 'Raleway', sans-serif;
        background-size: cover;
    }

    .judul {
        text-align: center;
        color: #fff;
        font-weight: bold;
        font-size: 25px;
        padding: 10px;
        margin-bottom: 10px;
    }

    .datamasuk {
        width: 90%;
        margin: 20px 0;
        padding: 20px;
        background-color: #f9f9f9; /* Latar belakang putih dengan sedikit transparansi */
        border-radius: 8px; /* Membuat sudut kotak sedikit membulat */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
        font-size: 18px; 
    }

    .datamasuk table {
        width: 100%;
        border-collapse: collapse;
    }

    .datamasuk table,
    .datamasuk th,
    .datamasuk td {
        border: 1px solid #ddd;
    }

    .datamasuk th,
    .datamasuk td {
        padding: 8px;
        text-align: center;
    }

    .datamasuk th {
        background-color: #007bff; /* Latar belakang biru untuk header tabel */
        color: white;
    }

    .datamasuk td a {
        color: #f9f9f9; /* Warna teks tautan putih */
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 5px;
        margin: 0 4px;
        display: inline-block;
    }

    .datamasuk td a.edit {
        background-color: #28a745; /* Warna latar hijau untuk tombol edit */
    }

    .datamasuk td a.delete {
        background-color: #dc3545; /* Warna latar merah untuk tombol delete */
    }

    .datamasuk td a:hover {
        opacity: 0.8; /* Efek hover untuk tautan */
    }

    .footer .box-container {
        display: flex;
        flex-wrap: wrap;
        gap: 100px;
        padding-top: 50px;
    }

    .footer .box-container .box {
        flex: 1 1 45px;
    }

    .footer .box-container .box h3 {
        font-size: 23px;
        color: #fff;
        padding: 0 0;
    }

    .footer .box-container .box p {
        font-size: 15px;
        color: #fff;
        padding: 0 0;
    }

    .footer .box-container .box a {
        display: block;
        font-size: 15px;
        color: #fff;
        padding: 0 0;
        text-decoration: none;
    }

    .footer .box-container .box a:hover {
        color: var(--blue);
    }

    .footer .box-container .box p i {
        padding: 0 0;
        padding-right: 8px;
        color: var(--ij);
    }

    .footer .credit {
        font-size: 20px;
        margin-top: 10px;
        padding: 10px;
        padding-top: 20px;
        text-align: center;
        border-top: 1px solid rgb(255, 255, 255);
        color: #fff;
    }

    .message {
        text-align: center;
        color: #fff;
        font-size: 20px;
        margin-top: 20px;
    }

    @media (max-width: 768px) {
        .datamasuk {
            width: 100%;                /* Box penuh di layar kecil */
        }
    }

    @media (max-width: 768px) {
        #menu {
            display: initial;
        }

        /* penyesuaian gaya saat layar berukuran 768px atau kurang */
        header .navbar {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            color: #0048ac;
            background: #fff;
            border-top: .1rem solid rgba(0, 0, 0, .2);
            border-bottom: .1rem solid rgba(0, 0, 0, .2);
            clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
        }

        /* bentuk klipnya akan berubah untuk menciptakan efek transisi atau animasi. */
        header .navbar.active {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
        }

        header .navbar a {
            color: #0048ac;
            font-size: 1.8rem;
            display: block;
            margin: 2rem 0;
            text-align: center;
        }

        .contact form .inputBox input {
            width: 100%;
        }
    }
    </style>
</head>
<body>

<?php
$conn = mysqli_connect("localhost", "root", "", "projectweb"); // Membuat koneksi ke database
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()); // Menampilkan pesan jika koneksi gagal
}

$message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Memeriksa apakah form dikirim dengan metode POST
    $id_buku = $_POST['id_buku'];
    $judul_buku = $_POST['judul_buku'];
    $nama_peminjam = $_POST['nama_peminjam'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    if ($id_buku == '' || $judul_buku == '' || $nama_peminjam == '' || $tanggal_pinjam == '') {
        $message = "Semua field harus diisi!"; // Menampilkan pesan jika ada field yang kosong
    } else {
        $input = "INSERT INTO data_peminjaman (id_buku, judul_buku, nama_peminjam, tanggal_pinjam) 
                  VALUES ('$id_buku', '$judul_buku', '$nama_peminjam', '$tanggal_pinjam')"; // Query untuk memasukkan data
        if (mysqli_query($conn, $input)) {
            $message = "Data berhasil dimasukkan"; // Menampilkan pesan jika data berhasil dimasukkan
        } else {
            $message = "Error: " . $input . "<br>" . mysqli_error($conn); // Menampilkan pesan jika terjadi kesalahan
        }
    }
}
?>

<body>
<center>
    <!--awal header-->
    <header>
        <!-- ink ke halaman home dengan kelas "logo". -->
        <!-- Menggunakan elemen span untuk memisahkan teks "Ruang" dan "Baca". -->
        <a href="home.html" class="logo"><span>Ruang</span>Baca</a>
        <!-- Div dengan ikon menu dari Font Awesome (fas fa-bars). -->
        <div id="menu" class="fas fa-bars"></div>
        <!-- Elemen navigasi dengan kelas "navbar". -->
        <nav class="navbar">
            <!-- Link ke halaman form input dengan teks "ruang pinjam". -->
            <a href="form_input.php">ruang pinjam</a>
            <!-- Link ke halaman data display dengan teks "data pinjam". -->
            <a href="data_display.php">data pinjam</a>
            <!-- Link ke halaman anggota dengan teks "our team". -->
            <a href="anggota.html">our team</a>
        </nav>
    </header>
        <!--akhir header-->

    <div class="judul">
        <h3>Data Peminjaman Ruang Baca</h3> <!-- Judul halaman -->
    </div>

    <div class="message">
        <?php echo $message; ?> <!-- Menampilkan pesan dari proses PHP, misalnya pesan sukses atau error -->
    </div>

    <div class="datamasuk">
        <h3>Data Peminjaman</h3> <!-- Judul bagian tabel data peminjaman -->
        <table border="3" width="70%"> <!-- Tabel untuk menampilkan data peminjaman -->
            <tr>
                <td align="center" width="10%"><b>ID Buku</b></td> <!-- Kolom ID Buku -->
                <td align="center" width="15%"><b>Judul Buku</b></td> <!-- Kolom Judul Buku -->
                <td align="center" width="15%"><b>Nama Peminjam</b></td> <!-- Kolom Nama Peminjam -->
                <td align="center" width="20%"><b>Tanggal Peminjaman</b></td> <!-- Kolom Tanggal Peminjaman -->
                <td align="center" width="20%"><b>Tanggal Pengembalian</b></td> <!-- Kolom Tanggal Pengembalian -->
                <td align="center" width="15%"><b>Keterangan</b></td> <!-- Kolom Keterangan -->
            </tr>
            <?php
                $cari = "SELECT * FROM data_peminjaman ORDER BY id_buku"; // Query untuk mengambil data dari tabel data_peminjaman, diurutkan berdasarkan id_buku
                $hasil_cari = mysqli_query($conn, $cari); // Eksekusi query
                while ($data = mysqli_fetch_row($hasil_cari)) { // Loop untuk menampilkan setiap baris data
                    echo "
                        <tr>
                        <td align='center' width='10%'>$data[0]</td> <!-- Menampilkan ID Buku -->
                        <td align='center' width='15%'>$data[1]</td> <!-- Menampilkan Judul Buku -->
                        <td align='center' width='15%'>$data[2]</td> <!-- Menampilkan Nama Peminjam -->
                        <td align='center' width='20%'>$data[3]</td> <!-- Menampilkan Tanggal Peminjaman -->
                        <td align='center' width='20%'>$data[4]</td> <!-- Menampilkan Tanggal Pengembalian -->
                        <td align='center' width='15%'>
                        <a href='update_pinjam.php?id_buku=$data[0]' class='edit'>Edit</a> <!-- Tautan untuk mengedit data, mengarah ke update_pinjam.php dengan parameter id_buku -->
                        <a href='delete_pinjam.php?id_buku=$data[0]' class='delete'>Delete</a> <!-- Tautan untuk menghapus data, mengarah ke delete_pinjam.php dengan parameter id_buku -->
                        </td>
                        </tr>";
                }
            ?>
        </table>
    </div>
</center>

    <!--awal footer section-->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Ruang Baca</h3>
                <p>Gedung J Fakultas Komunikasi dan Informatika, Kampus 2 Universitas Muhammadiyah Surakarta.</p>
            </div>

            <div class="box">
                <h3>layanan terbaik</h3>
                <p><a href="home.html">koleksi buku</a></p>
                <p><a href="form_input.php">ruang pinjam</a></p>
                <p><a href="data_display.php">data pinjam</a></p>
            </div>

            <div class="box">
                <h3>operasional layanan</h3>
                <p>Senin-Jumat 08.00 - 16.00 WIB</p>
                <p>Sabtu-Minggu 09.00 - 15.30 WIB</p>
                <p>Cuti Bersama dan Libur Nasional Tutup</p>
            </div>
            
            <div class="box">
                <h3>contact us</h3>
                <p><i class="fas fa-envelope"></i>l200220021@student.ums.ac.id</p>
                <p><i class="fas fa-envelope"></i>l200220037@student.ums.ac.id</p>
                <p><i class="fas fa-map-marker-alt"></i>Indonesia, Jawa Tengah, Surakarta</p>
            </div>
        </div>
        <div class="credit"> thank you for visit our Ruang Baca</div>
    </section>
    <!--akhir footer section-->

    <!-- menghubungkan file JS eksternal untuk menambahkan interaktivitas atau fungsionalitas tambahan ke halaman. -->
    <script src="js/script.js"></script>
</body>
</html>