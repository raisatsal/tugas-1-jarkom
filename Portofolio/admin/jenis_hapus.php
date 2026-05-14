<?php
include "koneksi.php";

$id = $_GET['id'];

$stmt = $dbh->prepare("DELETE FROM pendidikan WHERE id=?");
$stmt->execute([$id]);

header("Location: jenis_list.php");
?>