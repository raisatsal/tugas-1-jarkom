<?php
include "koneksi.php";

// PROSES UPDATE
if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nama = $_POST['nama_sekolah'];
    $jenjang = $_POST['jenjang'];
    $tahun = $_POST['tahun_lulus'];

    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    if($foto){
        move_uploaded_file($tmp, "img/".$foto);

        $stmt = $dbh->prepare("UPDATE journey 
            SET nama_sekolah=?, jenjang=?, tahun_lulus=?, foto_sekolah=? 
            WHERE id=?");
        $stmt->execute([$nama, $jenjang, $tahun, $foto, $id]);

    } else {
        $stmt = $dbh->prepare("UPDATE journey 
            SET nama_sekolah=?, jenjang=?, tahun_lulus=? 
            WHERE id=?");
        $stmt->execute([$nama, $jenjang, $tahun, $id]);
    }

    // BALIK KE LIST
    header("Location: index.php?hal=journey_list");
    exit;
}

// AMBIL DATA
$id = $_GET['id'];
$stmt = $dbh->prepare("SELECT * FROM journey WHERE id=?");
$stmt->execute([$id]);
$row = $stmt->fetch();
?>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h5>Edit Data Journey</h5>
        </div>

        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <table class="table table-bordered">
                    <tr>
                        <th width="200">Nama Sekolah</th>
                        <td>
                            <input type="text" name="nama_sekolah" class="form-control"
                                   value="<?= $row['nama_sekolah'] ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <th>Jenjang</th>
                        <td>
                            <input type="text" name="jenjang" class="form-control"
                                   value="<?= $row['jenjang'] ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <th>Tahun Lulus</th>
                        <td>
                            <input type="text" name="tahun_lulus" class="form-control"
                                   value="<?= $row['tahun_lulus'] ?>" required>
                        </td>
                    </tr>

                    <tr>
                        <th>Foto Lama</th>
                        <td>
                            <?php if($row['foto_sekolah']){ ?>
                                <img src="img/<?= $row['foto_sekolah'] ?>" width="80">
                            <?php } else { echo "-"; } ?>
                        </td>
                    </tr>

                    <tr>
                        <th>Ganti Foto</th>
                        <td>
                            <input type="file" name="foto" class="form-control">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" class="text-end">
                            <a href="index.php?hal=journey_list" class="btn btn-secondary">
                                Kembali
                            </a>
                            <button type="submit" name="update" class="btn btn-primary">
                                Update
                            </button>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
    </div>
</div>