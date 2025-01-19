<?php
    // koneksi database
    $conn = mysqli_connect('localhost', 'root', '', 'projectweb');
    // akses nilai parameter id_buku dengan metode GET
    $id_buku = $_GET['id_buku'];
    // akses nilai parameter submit dengan metode POST
    $submit = $_POST['submit'];
    // pernyataan SQL untuk menghapus data dari tabel
    $delete = "DELETE FROM data_peminjaman WHERE id_buku ='$id_buku'";
    // mengeksekusi pernyataan SQL untuk menghapus data pada koneksi database
    mysqli_query($conn, $delete);
    // echo digunakan untuk menterak blok kode js.
    // kode dibawah digunakan untuk menampilkan pesan js dan mengarahkan ulang pengguna
    echo "
        <script>
            window.location.href='data_display.php';
        </script>
        ";
?>