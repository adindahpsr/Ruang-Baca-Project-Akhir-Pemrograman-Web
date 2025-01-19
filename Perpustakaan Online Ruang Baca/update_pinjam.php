<?php
    // Koneksi ke database
    $conn = mysqli_connect('localhost', 'root', '', 'projectweb');
    // cek koneksi database apakah berhasil
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Proses update data jika form disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // mengambil alih nilai dari form yang telah di submit
        $id_buku = $_POST['id_buku'];
        $judul_buku = $_POST['judul_buku'];
        $nama_peminjam = $_POST['nama_peminjam'];
        $tanggal_pinjam = $_POST['tanggal_pinjam'];
        $tanggal_kembali = $_POST['tanggal_kembali'];

        // pernyataan SQL untuk mengupdate data
        $update = "UPDATE data_peminjaman SET 
                   judul_buku='$judul_buku', 
                   nama_peminjam='$nama_peminjam', 
                   tanggal_pinjam='$tanggal_pinjam', 
                   tanggal_kembali='$tanggal_kembali'
                   WHERE id_buku='$id_buku'";

        // menjalankan pernyataan SQL untuk mengupdate data
        if (mysqli_query($conn, $update)) {
            echo "
                <script>
                    window.location.href = 'data_display.php';
                </script>";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }

    // Mengambil data dari database untuk ditampilkan di form
    if (isset($_GET['id_buku'])) {
        $id_buku = $_GET['id_buku'];
        // mengambil semua data dari tabel data peminjaman
        $cari = "SELECT * FROM data_peminjaman WHERE id_buku='$id_buku'";
        // menjalankan pernyataan SQL untuk mengambil data
        $hasil_cari = mysqli_query($conn, $cari);
        // mengambil hasil query dalam bentuk array asosiatif
        $data = mysqli_fetch_array($hasil_cari);
    } else {
        echo "ID Buku tidak diberikan!";
        exit;
    }
?>

<!DOCTYPE html>
<!-- pembukaan elemen html -->
<html>
<head>
    <title>Update Data Peminjaman</title> <!-- judul halaman -->
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
            width: 0.6rem;
        }
        ::-webkit-scrollbar-track {
            background: #333;
        }
        ::-webkit-scrollbar-thumb {
            background: #fff;
            border-radius: 5rem;
        }

        /* mengatur gaya elemen body. */
        body {
            background: var(--gradient);
            padding: 3rem 7%;
            font-family: 'Raleway', sans-serif;
            background-size: cover;
            color: rgb(0, 0, 0);
        }

        /* mengatur gaya elemen judul. */
        .judul {
            text-align: center;
            color: #fff;
            font-weight: bold;
            font-size: 25px;
            padding: 10px 10px;
            margin-bottom: 10px;
        }

        /* mengatur gaya elemen data. */
        .data {
            width: 800px;
            background-color: #fff;
            margin: 10px 0;
            padding: 25px;
            border-radius: 8px;
            font-size: large;
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

        /* mengatur gaya elemen input secara umum. */
        input {
            border: 1;
            outline: 0;
            width: 90%;
            padding: 13px;
            margin: 10px 0 0 0;
            border-radius: 5px;
            font-weight: 600;
            align-items: center;
        }
    </style>
    <!-- akhir css -->
</head>

<body>
    <center>
        <!-- elemen div dengan kelas judul, berisi judul halaman. -->
        <div class="judul">
            <h3>Update Data Peminjaman</h3>
        </div>
        <!-- elemen div dengan kelas data, menampung tabel dan form HTML untuk pengisian data. -->
        <div class="data">
            <!-- form menggunakan metode POST dan mengarah ke data_display untuk pemrosesan data. -->
            <!-- POST digunakan untuk mengirim data yang dimasukkan dalam form ke server. -->
            <form method="POST" action="">
                <!-- awal pembuatan tabel input data. -->
                <table border="0" width="100%">
                    <!-- awal pembuatan baris tabel input data. -->
                    <!-- setiap baris tabel (<tr>) digunakan untuk satu input data. -->
                    <tr>
                        <td width="10%">ID Buku</td>
                        <td width="5%">:</td>
                        <td width="30%"><input type="text" name="id_buku" size="30" value="<?php echo $data['id_buku'] ?>" readonly></td>
                    </tr>
                    <tr>
                        <td width="10%">Judul Buku</td>
                        <td width="5%">:</td>
                        <td width="30%"><input type="text" name="judul_buku" size="30" value="<?php echo $data['judul_buku'] ?>"></td>
                    </tr>
                    <tr>
                        <td width="10%">Nama Peminjam</td>
                        <td width="5%">:</td>
                        <td width="30%"><input type="text" name="nama_peminjam" size="30" value="<?php echo $data['nama_peminjam'] ?>"></td>
                    </tr>
                    <tr>
                        <td width="10%">Tanggal Peminjaman</td>
                        <td width="5%">:</td>
                        <td width="30%"><input type="date" name="tanggal_pinjam" size="30" value="<?php echo $data['tanggal_pinjam'] ?>"></td>
                    </tr>
                    <tr>
                        <td width="10%">Tanggal Pengembalian</td>
                        <td width="5%">:</td>
                        <td width="30%"><input type="date" name="tanggal_kembali" size="30" value="<?php echo $data['tanggal_kembali'] ?>"></td>
                    </tr>
                    <!-- akhir pembuatan baris tabel input data. -->
                </table>
                <!-- akhir pembuatan tabel input data. -->

                <!-- class submit untuk membuat tombol submit. -->
                <div class="box">
                    <input type="submit" value="Submit" name="submit" class="tombol">
                </div>
            </form>
        </div>
    </center>

    <!-- menghubungkan file JS eksternal untuk menambahkan interaktivitas atau fungsionalitas tambahan ke halaman. -->
    <script src="js/script.js"></script>
</body>
</html>