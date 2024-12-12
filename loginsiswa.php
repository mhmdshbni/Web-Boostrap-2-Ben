<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$database = "presensi_sahbani";

// Buat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username && $password) {
        // Cek username dan password (bisa gunakan query database)
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
        $query = mysqli_query($koneksi, $sql);
        $result = mysqli_fetch_assoc($query);

        if ($result) {
            $_SESSION['admin'] = $result['username'];
            header("Location: menampilkandata.php");
            exit;
        } else {
            $error = "Username atau password salah!";
        }
    } else {
        $error = "Silahkan masukkan username dan password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>
    <h2>Login Admin</h2>
    <?php if ($error): ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <button type="submit" name="login">Login</button>
        </div>
    </form>
</body>
</html>
