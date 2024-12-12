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
        }
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
<div class="mx-auto">
        <div class="card">
            <h2 class="card-header" align="center">
            Edit Data
            </h2>
            <div class="card-body">
                <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                header("refresh:3;url=menampilkandata.php"); // 3 adalah detik
                }
                ?>

                <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                header("refresh:3;url=menampilkandata.php"); // 3 adalah detik
                }
                ?>

                <form action="menampilkandata.php" method="$_POST">
                    <div class="mb-3 row">
                        <label for="status_kehadiran" class="form-label">Status kehadiran</label>
                        <input type="text" class="form-control" id="status_kehadiran" name="status_kehadiran" value="<?php echo $status_kehadiran ?>">
                    </div>
                    <div class="mb-3 row">
                        <label for="waktu" class="form-label">Waktu</label>
                        <input type="time" class="form-control" id="waktu" name="waktu" value="<?php echo $waktu ?>">
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal ?>">
                    </div>
                    <div class="mb-3 row">
                        <label for="kelas" class="form-label">Kelas</label>
                        <select class="form-control" name="kelas" id="kelas">
                            <option value="">- Pilih kelas -</option>
                            <option value="X PPLG A" <?php if ($kelas == "X PPLG A") echo "selected" ?>>X PPLG A</option>
                            <option value="X PPLG B" <?php if ($kelas == "X PPLG B") echo "selected" ?>>X PPLG B</option>
                            <option value="XI PPLG A" <?php if ($kelas == "XI PPLG A") echo "selected" ?>>XI PPLG A</option>
                            <option value="XI PPLG B" <?php if ($kelas == "XI PPLG B") echo "selected" ?>>XI PPLG B</option>
                            <option value="XII PPLG A" <?php if ($kelas == "XII PPLG A") echo "selected" ?>>XII PPLG A</option>
                            <option value="XII PPLG B" <?php if ($kelas == "XII PPLG B") echo "selected" ?>>XII PPLG B</option>
                        </select>
                    </div>
                    <div class="mb-3 row">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $nisn ?>">
                    </div>
                    <div class="col-12">
                        <input type="submit" name="submit" value="Simpan data" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
