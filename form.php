<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Formulir</title>
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
    <style>
     input[type="text"], input[type="email"], input[type="number"] {
         width: 100%;
         padding: 10px;
         margin: 10px 0;
         border: 1px solid #ddd;
         border-radius: 4px;
     }
  </style>
    <body class="d-flex flex-column">
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
                            <li class="nav-item"><a class="nav-link" href="menampilkandata.php">Presensi</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                            <h1 class="fw-bolder" align="center">Tambah Data Siswa</h1>
                            <p class="lead fw-normal text-muted mb-0" align="center">By Banz</p>
                        </div>
     <form action="" method="POST">
          <table align="center">
               <tr>
                    <td>Nama :</td>
                    <td><input type="text"></td>
               </tr>
               <tr>
                    <td>Password :</td>
                    <td><input type="password"></td>
               </tr>
               <tr>
                    <td>NISN :</td>
                    <td><input type="number"></td>
               </tr>
               <tr>
                    <td>Tanggal :</td>
                    <td><input type="date"></td>
               </tr>
               <tr>
                    <td>Jenis Kelamin</td>
                    <td><input type="radio" name="JK"> Laki-Laki
                         <input type="radio" name="JK"> Perempuan
                    </td>
               </tr>
               <tr>
                    <td>Hobi</td>
                    <td><input type="checkbox"> Bermain game
                         <input type="checkbox"> Berenang
                         <input type="checkbox"> Berlari
                    </td>
               </tr>
               <tr>
                    <td>Kelas</td>
                    <td><select>
                         <option>Pilih Kelas</option>
                         <option>X PPLG A</option>
                         <option>X PPLG B</option>
                         <option>XI PPLG A</option>
                         <option>XI PPLG B</option>
                         <option>XII PPLG A</option>
                         <option>XII PPLG B</option>
                    </select>
                    </td>
               </tr>
               <tr>
                    <td>Alamat</td>
                    <td><textarea></textarea></td>
               </tr>
               <tr>
                    <td></td>
                    <td><input type="submit" value="simpan">
                         <input type="reset" value="reset">
                         <input type="button" value="kembali">
                    </td>
               </tr>
          </table>
     </form>
            </section>
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
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
