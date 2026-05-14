<?php
include "koneksi.php";

$nama = $_POST['nama_sekolah'];
$jenjang = $_POST['jenjang'];
$tahun = $_POST['tahun_lulus'];

$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

if($foto){
    move_uploaded_file($tmp, "img/".$foto);
}

$stmt = $dbh->prepare("INSERT INTO journey (nama_sekolah, jenjang, tahun_lulus, foto_sekolah) VALUES (?,?,?,?)");
$stmt->execute([$nama, $jenjang, $tahun, $foto]);

header("Location: journey_list.php");
?>