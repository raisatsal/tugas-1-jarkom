<?php
include "koneksi.php";

$id = $_POST['id'];

$stmt = $dbh->prepare("DELETE FROM journey WHERE id=?");
$stmt->execute([$id]);

header("Location: journey_list.php");
?>