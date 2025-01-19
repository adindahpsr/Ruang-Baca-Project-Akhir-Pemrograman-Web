<!DOCTYPE html>

<!-- pembukaan elemen html -->
<html>
<head>
    <!-- Menyertakan library Font Awesome untuk ikon. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Project</title> <!-- judul halaman -->
    <!-- awal css -->
    <style>
    /* root = variabel global CSS. mengatur warna dan gradient. */
    :root {
        --ij: #55b8ff;
        --blue: #0048ac;
        --gradient: linear-gradient(90deg, var(--ij), var(--blue));
    }

    /* Mengatur gaya scrollbar khusus browser berbasis WebKit */
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
        color: #fff;
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

    /* mengatur gaya elemen body. */
    body {
        background: var(--gradient);
        padding: 16px 5%;
        font-family: 'Raleway', sans-serif;
        background-size: cover;
    }

    /* mengatur gaya elemen judul. */
    .judul {
        text-align: center;
        color: #fff;
        font-weight: bold;
        font-size: 25px;
        padding: 10px;
        margin-bottom: 10px;
    }

    /* mengatur gaya elemen data. */
    .data {
        width: 800px;
        background-color: #fff;
        margin: 10px 0;
        padding: 25px;
        border-radius: 8px;
        font-size: 18px;
    }

    /* mengatur gaya khusus elemen submit dalam kelas data. */
    .data input[type="submit"] {
        width: 30%;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

     /* mengatur gaya elemen kelas footer dan elemen credit yang ada didalamnya. */
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

     /* mengatur gaya elemen input secara umum. */
    input {
        border: 1px solid;
        outline: none;
        width: 90%;
        padding: 13px;
        margin: 10px 0 0 0;
        border-radius: 5px;
        font-weight: 600;
        align-items: center;
    }

    @media (max-width: 768px) {
        .data {
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
    <!-- akhir css -->
</head>

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

    <!-- elemen div dengan kelas judul, berisi judul halaman. -->
    <div class="judul">
        <h3>Data Peminjaman Ruang Baca</h3>
    </div>
    <!-- elemen div dengan kelas data, menampung tabel dan form HTML untuk pengisian data. -->
    <div class="data">
        <!-- awal pembuatan tabel input data. -->
        <table border="0" width="100%">
        <!-- form menggunakan metode POST dan mengarah ke data_display untuk pemrosesan data. -->
        <!-- POST digunakan untuk mengirim data yang dimasukkan dalam form ke server. -->
        <form method="POST" action="data_display.php"> 
            <br>
            <!-- awal pembuatan baris tabel input data. -->
            <!-- setiap baris tabel (<tr>) digunakan untuk satu input data. -->
            <tr>
                <td width="10%">ID Buku</td>
                <td width="5%">:</td>
                <td width="30%"><input type="text" name="id_buku" size="30"></td>
            </tr>
            <tr>
                <td width="10%">Judul Buku</td>
                <td width="5%">:</td>
                <td width="30%"><input type="text" name="judul_buku" size="30"></td>
            </tr>
            <tr>
                <td width="10%">Nama Peminjam</td>
                <td width="5%">:</td>
                <td width="30%"><input type="text" name="nama_peminjam" size="30"></td>
            </tr>
            <tr>
                <td width="10%">Tanggal Peminjaman</td>
                <td width="5%">:</td>
                <td width="30%"><input type="date" name="tanggal_pinjam" size="30"></td>
            </tr>
            <tr>
                <td width="10%">Tanggal Pengembalian</td>
                <td width="5%">:</td>
                <td width="30%"><input type="date" name="tanggal_kembali" size="30"></td>
            </tr>
            <!-- akhir pembuatan baris tabel input data. -->
        </table>
        <!-- akhir pembuatan tabel input data. -->

        <!-- class submit untuk membuat tombol submit. -->
        <div class="box">
            <input type="submit" value="Submit" name="submit" class="tombol">
        </div>
        </form>
    </div><br><br>

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
<!-- akhir elemen html -->