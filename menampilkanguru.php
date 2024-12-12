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
                            <li class="nav-item"><a class="nav-link" href="menampilkandata.php">Presensi</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
<!-- Projects Section-->
<section class="p-5">
    <h1 class="mb-2">Daftar Data Guru</h1>
	<a class="btn btn-primary" href="pages/create.php">Tambah Data Guru</a>
	<table class="table table table-striped table-bordered">
		<tr bgcolor="yellow">
            <th align="center">NO</th>
			<th>NIP</th>
			<th>Nama Guru</th>
			<th>Jabatan</th>
			<th>No.Hp</th>
            <th>Aksi</th>
		</tr>
		<?php 
		include 'koneksi.php';
		$no = 1;
		$data = mysqli_query($koneksi,"select * from guru");
		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td align="center"><?php echo $no++; ?></td>
				<td><?php echo $d['NIP']; ?></td>
				<td><?php echo $d['Nama']; ?></td>
				<td><?php echo $d['Jabatan']; ?></td>
                <td><?php echo $d['No.Telp']; ?></td>
				<td>
				<button class="edit-btn">Edit</button>
				<button class="delete-btn">Delete</button>
				</td>
			</tr>
            <?php
        }
        ?>
	</table>
</selection>

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