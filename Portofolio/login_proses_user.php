<?php
session_start();

include "koneksi.php";

/* =========================
   AMBIL INPUT
========================= */
$email    = $_POST['email'];
$password = md5($_POST['password']);

/* =========================
   CEK LOGIN
========================= */
$stmt = $dbh->prepare("
    SELECT * FROM users2
    WHERE email = ?
    AND password = ?
");

$stmt->execute([
    $email,
    $password
]);

$user = $stmt->fetch();

/* =========================
   JIKA LOGIN BERHASIL
========================= */
if($user){

    $_SESSION['login'] = true;
    $_SESSION['email'] = $user['email'];

    /* MASUK KE INDEX USER */
    header("Location: index_user.php");
    exit;

} else {

    $_SESSION['gagal'] = "Email atau password salah!";

    /* KEMBALI KE LOGIN USER */
    header("Location: login_user.php");
    exit;
}
?>