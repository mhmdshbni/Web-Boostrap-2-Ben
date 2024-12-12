<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "presensi_sahbani"; // Ganti dengan nama database Anda

// Buat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$status_kehadiran = "";
$waktu            = "";
$tanggal          = "";
$kelas            = "";
$nisn             = "";
$error            = "";
$sukses           = "";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}

if($op == 'delete'){
    $id = $_GET['id'];
    $sql1 = "DELETE  FROM presensi WHERE id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil menghapus data";
    }else{
        $error = "Gagal menghapus data!";
    }
}

if($op == 'edit'){
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM presensi WHERE id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);
    $r2 = mysqli_fetch_array($q1);
    $status_kehadiran = $r2['status_kehadiran'] ?? '';
    $waktu = $r2['waktu'] ?? '';
    $tanggal = $r2['tanggal'] ?? '';
    $kelas = $r2['kelas'] ?? '';
    $nisn = $r2['nisn'] ?? '';

    if($status_kehadiran == ''){
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['submit'])) { //untuk edit
    $status_kehadiran = $_POST['status_kehadiran'];
    $waktu            = $_POST['waktu'];
    $tanggal          = $_POST['tanggal'];
    $kelas            = $_POST['kelas'];
    $nisn             = $_POST['nisn'];

    if ($status_kehadiran && $waktu && $tanggal && $kelas && $nisn) {
        // Masukkan data ke database
        if($op =='edit'){ // untuk diedit
            $sql1 = "UPDATE presensi
            SET status_kehadiran = '$status_kehadiran', waktu = '$waktu', tanggal = '$tanggal', kelas = '$kelas', nisn = '$nisn' WHERE id = '$id'";
            $q1 = mysqli_query($koneksi,$sql1);
            if ($q1) {
                $sukses = "Data berhasil diperbarui";
            } else {
                $error = "Data gagal diperbarui";
            }
        }else{ // untuk insert
            $sql1 = "INSERT INTO presensi (status_kehadiran, waktu, tanggal, kelas, nisn) 
                 VALUES ('$status_kehadiran', '$waktu', '$tanggal', '$kelas', '$nisn')";
        $q1 = mysqli_query($koneksi, $sql1); // Menggunakan mysqli_query untuk menjalankan query
        if ($q1) {
            $sukses = "Berhasil memasukan data baru";
        } else {
            $error = "Gagal memasukan data: " . mysqli_error($koneksi);
        }
        }
    } else {
        $error = "Silahkan masukan data anda yang benar";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Database Presensi</title>
	<!-- Favicon-->
	<link rel="icon" type="image/x-icon" href="assets/logo.png" />
        <!-- Custom Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
</head>
<body>

<style>
table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 18px;
    text-align: left;
}

th, td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

.edit-btn, .delete-btn {
    padding: 8px 12px;
    margin: 4px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

.edit-btn {
    background-color: #4CAF50; /* Green */
    color: white;
}

.delete-btn {
    background-color: #f44336; /* Red */
    color: white;
}

.edit-btn:hover {
    background-color: #45a049;
}

.delete-btn:hover {
    background-color: #e60000;
}

</style>

    <body class="d-flex flex-column h-100 bg-light">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html"><span class="fw-bolder text-primary">Baniiiiuuuuu</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link" href="index.php">Biodata</a></li>
                            <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
                            <li class="nav-item"><a class="nav-link" href="video and music.php">Video & Music</a></li>
							<li class="nav-item"><a class="nav-link" href="table.php">Tabel</a></li>
                            <li class="nav-item"><a class="nav-link" href="form.php">Form</a></li>
							<li class="nav-item"><a class="nav-link" href="menampilkansiswa.php">Siswa</a></li>
							<li class="nav-item"><a class="nav-link" href="menampilkanguru.php">Guru</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
<!-- Projects Section-->
<section class="p-5">
<a class="btn btn-primary" href="tambah.php">Tambah Data Siswa</a>
        <div class="card">
            <div class="card-body">
            <h1 class="card-header" align="center">Daftar Data Presensi Siswa XI PPLG B</h1>
                <table class="table">
                    <thead>
                    <tr bgcolor="yellow">
                        <th scope="col">No</th>
                        <th scope="col">Status Kehadiran</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    <tbody>
                        <?php
                        $sql1 = "SELECT * FROM uPresSiswaKelas";
                        $q1 = mysqli_query($koneksi,$sql1);
                        $urut = 1;
                        while($_SERVER = mysqli_fetch_array($q1)){
                            $id = $_SERVER['id'];
                            $status_kehadiran = $_SERVER['status_kehadiran'];
                            $waktu = $_SERVER['waktu'];
                            $tanggal = $_SERVER['tanggal'];
                            $nama = $_SERVER['nama'];
                            $kelas = $_SERVER['kelas'];
                            $nisn = $_SERVER['nisn'];

                            ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $status_kehadiran ?></td>
                                <td scope="row"><?php echo $waktu ?></td>
                                <td scope="row"><?php echo $tanggal ?></td>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $kelas ?></td>
                                <td scope="row"><?php echo $nisn ?></td>
                                <td scope="row">
                                    <a href="edit.php?op=edit&id=<?php echo $id?>"><button type="button" class="btn btn-success">Edit</button></a>
                                    <a href="menampilkandata.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                    </thead>
                <table>
            </div>
        </div>
</selection>
                    </main>
        <!-- Footer-->
        <footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0">Copyright &copy; Your Website 2023</div></div>
                    <div class="col-auto">
                        <a class="small" href="#!">Privacy</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" href="#!">Terms</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
</body>
</html>
