<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP System</title>
    <link rel="stylesheet" href="{{ asset('resources/css/app.css') }}"> <!-- Tambahkan CSS Anda di sini -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">

    <style>
        .satisfy-regular {
  font-family: "Satisfy", cursive;
  font-weight: 400;
  font-style: normal;
}


      /* General Styles */
body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    background-color: #E2F1E7; /* Background hitam untuk kesan futuristik */
    color: #393E46 !important; /* Warna teks putih */
    margin: 0;
    padding: 0;
    display: flex; /* Menggunakan flexbox untuk menata layout */
    flex-direction: column;
    min-height: 100vh; /* Memastikan body mengisi viewport */
}


/* Navbar Styles */
/* Navbar */
.navbar {
    background-color: #629584 !important; /* Tetap abu-abu gelap */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Bayangan lebih halus dan lembut */
    padding: 10px 20px; /* Tambah padding untuk jarak yang lebih baik */
    border-bottom: 1px solid rgba(255, 255, 255, 0.2); /* Garis bawah tipis untuk pemisahan */
    z-index: 1000;
}

.navbar-brand {
    color: #E2F1E7; /* Tetap warna merah */
    font-weight: 600; /* Gunakan font-weight sedikit lebih ringan untuk kesan elegan */
    font-family: "Satisfy", cursive;
    font-weight: 400;
    font-style: normal;
    font-size: 1.5rem; /* Sedikit lebih besar untuk tampilan yang lebih menonjol */
    margin-left: 25px; /* Tambah jarak */
    transition: color 0.3s ease, margin-bottom 0.3s ease; /* Transisi halus */
}

.navbar-brand:hover {
    color: #387478; /* Tetap warna merah saat hover */
    margin-bottom: 3px; /* Sedikit transisi margin saat hover */
}

.nav-link {
    color: #E2F1E7; /* Warna teks tetap */
    font-size: 1rem; /* Ukuran teks standar */
    letter-spacing: 0.5px; /* Sedikit jarak antar huruf untuk kesan rapi */
    font-weight: 500; /* Berat teks yang seimbang */
    transition: color 0.3s ease, transform 0.2s ease; /* Transisi warna dan efek transformasi */
}

.nav-link:hover {
    color: #387478; /* Tetap merah saat hover */
    transform: translateY(-2px); /* Sedikit pergerakan ke atas untuk interaksi */
}

/* Tambahan padding pada container */
.navbar .container-fluid {
    padding: 0 30px;
}

/* Responsive adjustment untuk mobile view */
@media (max-width: 768px) {
    .navbar-brand {
        font-size: 1.3rem; /* Ukuran lebih kecil di mobile */
    }

    .nav-link {
        font-size: 0.9rem; /* Ukuran lebih kecil untuk mobile */
    }
}


/* Sidebar Styles */
.main-menu {
    background: #629584 !important; /* Abu-abu gelap */
    position: fixed;
    top: 0;
    bottom: 0;
    height: 100%;
    left: 0;
    width: 60px; /* Lebar awal sidebar */
    overflow: hidden;
    transition: width 0.3s ease-in-out; /* Transisi lebar sidebar */
    z-index: 1000; /* Agar sidebar tetap di atas */
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5); /* Bayangan untuk sidebar */
}

.main-menu:hover {
    width: 250px; /* Lebar sidebar saat hover */
}

.main-menu ul {
    padding: 0;
    list-style: none; /* Menghilangkan bullet pada list */
    margin: 20px 0;
}

.main-menu li {
    margin-bottom: -28%;
    margin-top: 28%; /* Jarak antar item menu */
}

.main-menu li a {
    display: flex;
    align-items: center;
    padding: 1px;
    color: #f0f0f0; /* Warna teks putih */
    text-decoration: none; /* Menghilangkan garis bawah */
    transition: background-color 0.3s ease; /* Transisi background */
}

.main-menu li a:hover {
    background-color: transparent !important; /* Warna lebih gelap saat hover */
}

.main-menu li a i {
    margin-right: 20px; /* Jarak antara ikon dan teks */
    color: #393E46;
     /* Warna ikon merah */
}

/* Main Content Styles */
#content {
    margin-left: 60px; /* Jarak untuk sidebar */
    padding: 20px; /* Jarak isi konten */
    transition: margin-left 0.3s ease; /* Transisi saat sidebar di-toggle */
    flex-grow: 1; /* Memastikan konten mengambil sisa ruang */
}

/* Footer Styles */
/* Footer */
footer {
    background-color: #629584 !important; /* Warna footer tetap abu-abu gelap */
    color: #E2F1E7 !important; /* Warna teks tetap putih */
    padding: 20px; /* Tambahkan lebih banyak padding untuk kenyamanan visual */
    text-align: center; /* Teks tetap di tengah */
    position: relative; /* Tetap agar footer berada di bawah konten */
    margin-top: auto; /* Memastikan footer selalu di bawah */
    box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.2); /* Bayangan lebih lembut dari atas */
    z-index: 2000;
    font-size: 0.95rem; /* Ukuran font sedikit lebih kecil untuk footer */
    letter-spacing: 0.5px; /* Jarak antar huruf sedikit diperbesar untuk kesan elegan */
    border-top: 1px solid rgba(255, 255, 255, 0.2); /* Garis tipis di bagian atas footer */
    transition: background-color 0.3s ease; /* Transisi halus pada background-color */
}

footer:hover {
    background-color: #4E7D6E; /* Sedikit perubahan warna abu-abu saat hover */
}

/* Link di dalam footer */
footer a {
    color: #E2F1E7; /* Warna link tetap putih */
    text-decoration: none; /* Hilangkan underline pada link */
    transition: color 0.3s ease; /* Transisi halus pada warna link */
}

footer a:hover {
    color: #387478; /* Warna link berubah menjadi merah saat hover */
}

/* Responsive adjustment for footer */
@media (max-width: 768px) {
    footer {
        font-size: 0.85rem; /* Ukuran font lebih kecil di mobile */
        padding: 15px; /* Padding lebih kecil untuk layar mobile */
    }
}


/* Active Link Styles */
.nav-link.active {
    color: #E2F1E7 !important; /* Warna merah untuk link aktif */
}

.nav-link.active:hover {
    color:#387478;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .main-menu {
        width: 50px; /* Lebar sidebar untuk layar kecil */
    }

    .main-menu:hover {
        width: 200px; /* Lebar sidebar saat hover pada layar kecil */
    }

    #content {
        margin-left: 50px; /* Jarak konten untuk sidebar kecil */
    }
}

/* Gaya untuk tabel */
.table {
    width: 100%;
    border-collapse: collapse; /* Menggabungkan border agar tidak double */
    background-color: #333; /* Warna latar belakang tabel */
    color: #f0f0f0; /* Warna teks tabel */
    font-size: 16px;
    margin-bottom: 20px;
    border-radius: 5px; /* Membuat sudut tabel melengkung */
    overflow: hidden;
}

/* Gaya untuk header tabel */
.table thead th {
    background-color: #487265; /* Warna latar belakang header tabel */
    color: #ffffff; /* Warna teks header tabel */
    padding: 12px; /* Padding untuk sel header */
    text-align: center;
    border-bottom: 2px solid #555; /* Border bawah header */
}

/* Gaya untuk isi tabel */
.table tbody td {
    padding: 20px; /* Padding untuk sel */
    border-bottom: 1px solid #555; /* Border bawah untuk memisahkan baris */
    background-color: #629584;
    color: #E2F1E7;
    text-align: center;
}

/* Gaya untuk baris ganjil */
.table tbody tr:nth-child(odd) {
    background-color: #3a3a3a; /* Warna background untuk baris ganjil */
}

/* Gaya untuk baris genap */
.table tbody tr:nth-child(even) {
    background-color: #4a4a4a; /* Warna background untuk baris genap */
}

/* Gaya hover untuk baris */
.table tbody tr:hover {
    background-color: #555; /* Warna saat baris di-hover */
}

/* Tabel responsive */
@media (max-width: 768px) {
    .table {
        font-size: 14px;
    }
}

/* Button Styles */
/* Gaya dasar untuk semua tombol */
.btn {
    background-color: #4E7D6E; /* Warna abu-abu gelap */
    color: #f0f0f0; /* Warna teks terang */
    border: none; /* Menghilangkan border default */
    padding: 10px 20px; /* Ukuran padding */
    font-size: 16px; /* Ukuran teks */
    border-radius: 5px; /* Membuat sudut tombol agak melengkung */
    cursor: pointer; /* Mengubah kursor saat di-hover */
    transition: background-color 0.3s ease; /* Animasi transisi warna */
}

/* Hover sederhana tanpa mencolok */
.btn:hover {
    background-color: #487265;
    color: #f0f0f0; /* Warna sedikit lebih terang saat di-hover */
}

/* Fokus pada tombol */
.btn:focus {
    outline: none; /* Menghilangkan outline default */
    box-shadow: 0 0 0 2px #888888; /* Tambahkan sedikit shadow untuk fokus */
}

/* Tombol dengan warna yang berbeda saat dinonaktifkan */
.btn:disabled {
    background-color: #3a3a3a; /* Warna lebih gelap saat tombol tidak aktif */
    cursor: not-allowed; /* Mengubah kursor saat tombol tidak aktif */
    color: #9a9a9a; /* Warna teks lebih pudar */
}

/* Form Styles */
form {
    display: inline-block; /* Agar form tidak memakan seluruh lebar */
}

.form-control {
    color: #f0f0f0; /* Warna teks input */
    border: 1px solid #555; /* Border abu-abu */
}

.form-control:focus {
    background-color: #f0f0f0; /* Warna background saat fokus */
    color: #555; /* Warna teks tetap terang */
}

/* Responsive Styles */
@media (max-width: 768px) {
    .table {
        font-size: 14px; /* Ukuran font lebih kecil untuk mobile */
    }

    .btn {
        width: 100%; /* Tombol mengambil lebar penuh pada mobile */
        margin-bottom: 10px; /* Jarak antar tombol pada mobile */
    }
}

/* Form Labels */
.form-label {
    font-weight: 600; /* Menebalkan label */
    color: #333; /* Warna teks label */
}

/* Input Fields */
.form-control {
    border-radius: 4px; /* Sudut membulat untuk input */
    border: 1px solid #ccc; /* Garis batas abu-abu */
    transition: border-color 0.3s ease; /* Transisi halus pada border */
}

.form-control:focus {
    border-color: #629584; /* Warna border saat fokus */
    box-shadow: 0 0 5px rgba(98, 149, 132, 0.5); /* Efek bayangan saat fokus */
}

/* Buttons */
.btn-primary {
    background-color: #4E7D6E; /* Warna tombol utama */
    border-color: #4E7D6E; /* Garis batas tombol utama */
}

.btn-primary:hover {
    background-color: #487265; /* Warna tombol utama saat hover */
}

.btn-secondary {
    background-color: #487265; /* Warna tombol kedua */
    border-color: #E2F1E7; /* Garis batas tombol kedua */
}

.btn-secondary:hover {
    background-color: #456d60; /* Warna tombol kedua saat hover */
}

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="btn btn-dark" id="toggleSidebar">
                <i class="fa fa-bars" style="font-size: 30px" aria-hidden="true"></i>
            </button>
            <a class="navbar-brand" href="#"> Nila Outbond <i class="fa fa-plane" aria-hidden="true" style="font-size: 20px"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Home</a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ Auth::user()->name }}</a>
                    </li>
                @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <nav class="main-menu" id="sidebar">
        <ul>
            <li>
                <a href="{{ route('employees.index') }}">
                    <i class="fa fa-user fa-2x"></i>
                    <span class="nav-text">Karyawan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('finances.index') }}">
                    <i class="fa fa-university fa-2x"></i>
                    <span class="nav-text">Keuangan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('schedules.index') }}">
                    <i class="fa fa-list fa-2x"></i>
                    <span class="nav-text">Penjadwalan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('marketings.index') }}">
                    <i class="fa fa-line-chart fa-2x"></i>
                    <span class="nav-text">Marketing</span>
                </a>
            </li>
            <!-- Tambahkan item lainnya -->
        </ul>
        <ul class="logout">
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </nav>

    <!-- Main Content -->
    <main id="content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class=" text-center text-white py-3">
        <p>&copy; 2024 Aplikasi ERP.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <script>
        // Toggle Sidebar
        $('#toggleSidebar').on('click', function () {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });

        // SweetAlert untuk menampilkan pesan dari session
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: true,
                timer: 3000
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                showConfirmButton: true,
                timer: 3000
            });
        @endif

        // Fungsi konfirmasi penghapusan menggunakan SweetAlert
        function confirmDeletion(event, formId) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Tindakan ini tidak dapat dibatalkan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
</body>
</html>
