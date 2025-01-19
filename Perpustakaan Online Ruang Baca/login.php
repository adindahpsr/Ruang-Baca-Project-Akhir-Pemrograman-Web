<?php 
session_start(); // Memulai sesi PHP
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED); // Mengatur laporan kesalahan untuk mengabaikan jenis kesalahan tertentu
$cnn = new mysqli('localhost', 'root', '', 'projectweb'); // Membuat koneksi ke database MySQL

// Periksa koneksi
if ($cnn->connect_error) {
    die("Koneksi gagal: " . $cnn->connect_error); // Jika koneksi gagal, hentikan skrip dan tampilkan pesan kesalahan
}

if (isset($_POST['submit'])) { // Memeriksa apakah form telah disubmit
    // Menggunakan metode yang lebih aman untuk menangani input pengguna
    $Username = $cnn->real_escape_string($_POST['username']); // Membersihkan input username
    $Password = $cnn->real_escape_string($_POST['pw']); // Membersihkan input password

    // Memeriksa apakah field tidak kosong
    if (!empty($Username) && !empty($Password)) { 
        // Menggunakan prepared statements untuk mencegah SQL injection
        $stmt = $cnn->prepare("SELECT * FROM admin WHERE username = ? AND pw = ?");
        $stmt->bind_param('ss', $Username, $Password); // Mengikat parameter username dan password ke statement
        $stmt->execute(); // Menjalankan query
        $result = $stmt->get_result(); // Mendapatkan hasil dari query

        if ($result->num_rows > 0) { // Memeriksa apakah ada baris hasil yang cocok di database
            $row = $result->fetch_assoc(); // Mengambil hasil query dalam bentuk array asosiatif
            // Berhasil login
            $_SESSION['username'] = $row['username']; // Menyimpan username ke dalam sesi
            $_SESSION['status'] = $row['status']; // Menyimpan status pengguna ke dalam sesi
            echo "<script>
                    window.location.href = 'home.html'; // Mengarahkan pengguna ke halaman home.html jika login berhasil
                  </script>";
        } else { 
            // Gagal login
            echo "<script>
                    alert('Gagal Login'); // Menampilkan pesan kesalahan
                    window.location.href = 'login.php'; // Mengarahkan pengguna kembali ke halaman login
                  </script>";
        }
        $stmt->close(); // Menutup prepared statement
    } else {
        echo "<script>
                alert('Username dan Password tidak boleh kosong'); // Menampilkan pesan kesalahan jika username atau password kosong
                window.location.href = 'login.php'; // Mengarahkan pengguna kembali ke halaman login
              </script>";
    }
}
?> 

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8"> <!-- Menentukan karakter encoding dokumen -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Mengatur viewport agar halaman responsif pada perangkat seluler -->
    <title>Login</title> <!-- Menentukan judul halaman -->
    <style>
    :root {
        --ij : #55b8ff; /* Warna untuk gradien */
        --blue: #0048ac; /* Warna untuk gradien */
        --gradient: linear-gradient(90deg, var(--ij), var(--blue)); /* Mendefinisikan gradien */
    }
    body {
        background: var(--gradient); /* Mengatur latar belakang body dengan gradien */
        display: flex; /* Menggunakan flexbox untuk tata letak */
        font-family: 'Raleway', sans-serif; /* Mengatur font */
        justify-content: center; /* Menjaga konten di tengah secara horizontal */
        align-items: center; /* Menjaga konten di tengah secara vertikal */
        height: 100vh; /* Mengatur tinggi body menjadi 100% dari viewport height */
        margin: 0; /* Mengatur margin menjadi nol */
    }
    .login-container {
        background-color: rgba(255, 255, 255, 0.9); /* Mengatur latar belakang container dengan warna putih transparan */
        font-family: 'Raleway', sans-serif; /* Mengatur font */
        padding: 40px; /* Mengatur padding */
        border-radius: 8px; /* Mengatur border-radius */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Mengatur bayangan */
        text-align: center; /* Mengatur teks menjadi rata tengah */
    }
    input[type="text"], input[type="password"] {
        font-family: 'Raleway', sans-serif; /* Mengatur font */
        width: 90%; /* Mengatur lebar input */
        padding: 10px; /* Mengatur padding */
        margin: 10px 0; /* Mengatur margin */
        border: 1px solid #ccc; /* Mengatur border */
        border-radius: 4px; /* Mengatur border-radius */
    }
    input[type="submit"] {
        font-family: 'Raleway', sans-serif; /* Mengatur font */
        padding: 10px 40px; /* Mengatur padding */
        border: none; /* Menghilangkan border */
        background-color: #13528c; /* Mengatur warna latar belakang */
        color: #fff; /* Mengatur warna teks */
        border-radius: 4px; /* Mengatur border-radius */
        cursor: pointer; /* Mengatur cursor menjadi pointer */
    }
    input[type="submit"]:hover {
        background-color: #218838; /* Mengubah warna latar belakang saat di-hover */
    }
    </style>
</head>
<body>
    <div class="login-container">
        <form method='post' action='login.php'> <!-- Form login dengan metode POST yang mengarah ke login.php -->
            <h2>Login</h2> <!-- Judul form -->
            <input type='text' name='username' placeholder='Username' required><br> <!-- Input untuk username -->
            <input type='password' name='pw' placeholder='Password' required><br> <!-- Input untuk password -->
            <input type='submit' name='submit' value='Login'> <!-- Tombol submit -->
        </form>
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p> <!-- Link ke halaman pendaftaran -->
    </div>
</body>
</html>