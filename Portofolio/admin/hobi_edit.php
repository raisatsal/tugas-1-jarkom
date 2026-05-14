<?php
include "koneksi.php";

$id = $_GET['id'];

$stmt = $dbh->prepare("SELECT * FROM hobi WHERE id=?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Hobi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h3>Edit Hobi</h3>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

        <div class="mb-3">
            <label>Nama Hobi</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_hobi']; ?>" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="jenis_list.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>

<?php
if(isset($_POST['nama'])){
    $stmt = $dbh->prepare("UPDATE hobi SET nama_hobi=? WHERE id=?");
    $stmt->execute([$_POST['nama'], $_POST['id']]);

    echo "<script>alert('Hobi diupdate');window.location='jenis_list.php';</script>";
}
?>