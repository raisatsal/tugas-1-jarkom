<?php
include "koneksi.php";

$id = $_GET['id'];

$stmt = $dbh->prepare("SELECT * FROM pendidikan WHERE id=?");
$stmt->execute([$id]);
$d = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h3>Edit Data</h3>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $d['id']; ?>">

        <div class="mb-3">
            <label>Nama Jenjang</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $d['nama_jenjang']; ?>" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="jenis_list.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>

<?php
if(isset($_POST['nama'])){
    $stmt = $dbh->prepare("UPDATE pendidikan SET nama_jenjang=? WHERE id=?");
    $stmt->execute([$_POST['nama'], $_POST['id']]);

    echo "<script>alert('Berhasil diupdate');window.location='jenis_list.php';</script>";
}
?>