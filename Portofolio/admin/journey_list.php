<?php 
ob_start();

include "koneksi.php";

/* =========================
   SIMPAN DATA
========================= */
if(isset($_POST['simpan'])){

    $nama    = $_POST['nama_sekolah'];
    $jenjang = $_POST['jenjang'];
    $tahun   = $_POST['tahun_lulus'];

    $namaFile = $_FILES['foto']['name'];
    $tmp      = $_FILES['foto']['tmp_name'];

    if($namaFile){

        $namaBaru = time().'_'.$namaFile;

        move_uploaded_file($tmp, "img/".$namaBaru);

    } else {

        $namaBaru = null;
    }

    $stmt = $dbh->prepare("
        INSERT INTO journey
        (nama_sekolah, jenjang, tahun_lulus, foto_sekolah)
        VALUES (?,?,?,?)
    ");

    $stmt->execute([
        $nama,
        $jenjang,
        $tahun,
        $namaBaru
    ]);

    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Education Journey</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">

    <div class="card shadow border-0 rounded-4 overflow-hidden">

        <!-- HEADER -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">

            <h5 class="mb-0 fw-bold">
                <i class="bi bi-mortarboard-fill me-2"></i>
                My Education Journey
            </h5>

            <!-- BUTTON MODAL -->
            <button 
                class="btn btn-light btn-sm fw-semibold"
                data-bs-toggle="modal"
                data-bs-target="#modalTambah"
            >
                <i class="bi bi-plus-lg"></i>
                Tambah Journey
            </button>

        </div>

        <!-- BODY -->
        <div class="card-body bg-white">

            <div class="table-responsive">

                <table class="table table-hover align-middle text-center">

                    <thead class="table-primary">

                        <tr>
                            <th width="7%">No</th>
                            <th width="15%">Foto</th>
                            <th>Nama Sekolah</th>
                            <th>Jenjang</th>
                            <th>Tahun Lulus</th>
                            <th width="18%">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php
                    $no = 1;

                    $stmt = $dbh->query("
                        SELECT * FROM journey
                        ORDER BY id DESC
                    ");

                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>

                        <tr>

                            <!-- NO -->
                            <td>
                                <?= $no++ ?>
                            </td>

                            <!-- FOTO -->
                            <td>

                                <?php if($row['foto_sekolah']){ ?>

                                    <img
                                        src="img/<?= $row['foto_sekolah'] ?>"
                                        width="90"
                                        height="70"
                                        class="img-thumbnail rounded-3"
                                        style="object-fit:cover;"
                                    >

                                <?php } else { ?>

                                    <span class="text-muted">
                                        Tidak ada foto
                                    </span>

                                <?php } ?>

                            </td>

                            <!-- NAMA -->
                            <td class="fw-semibold">
                                <?= $row['nama_sekolah'] ?>
                            </td>

                            <!-- JENJANG -->
                            <td>
                                <span class="badge bg-primary">
                                    <?= $row['jenjang'] ?>
                                </span>
                            </td>

                            <!-- TAHUN -->
                            <td>
                                <?= $row['tahun_lulus'] ?>
                            </td>

                            <!-- AKSI -->
                            <td>

                                <!-- EDIT -->
                                <a
                                    href="journey_edit.php?id=<?= $row['id'] ?>"
                                    class="btn btn-warning btn-sm text-white"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <!-- HAPUS -->
                                <form
                                    method="POST"
                                    action="journey_hapus.php"
                                    style="display:inline;"
                                >

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?= $row['id'] ?>"
                                    >

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data?')"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- =========================
     MODAL TAMBAH DATA
========================= -->
<div class="modal fade" id="modalTambah" tabindex="-1">

    <div class="modal-dialog modal-lg">

        <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

            <form method="POST" enctype="multipart/form-data">

                <!-- HEADER -->
                <div class="modal-header bg-primary text-white">

                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-plus-circle me-2"></i>
                        Tambah Data Journey
                    </h5>

                    <button
                        type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                    ></button>

                </div>

                <!-- BODY -->
                <div class="modal-body">

                    <div class="row">

                        <!-- Nama Sekolah -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Nama Sekolah
                            </label>

                            <input
                                type="text"
                                name="nama_sekolah"
                                class="form-control"
                                placeholder="Masukkan nama sekolah"
                                required
                            >

                        </div>

                        <!-- Jenjang -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Jenjang
                            </label>

                            <select
                                name="jenjang"
                                class="form-select"
                                required
                            >
                                <option value="">-- Pilih Jenjang --</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                                <option value="Kuliah">Kuliah</option>
                            </select>

                        </div>

                        <!-- Tahun -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Tahun Lulus
                            </label>

                            <input
                                type="number"
                                name="tahun_lulus"
                                class="form-control"
                                placeholder="2024"
                                required
                            >

                        </div>

                        <!-- Foto -->
                        <div class="col-md-6 mb-3">

                            <label class="form-label fw-semibold">
                                Foto Sekolah
                            </label>

                            <input
                                type="file"
                                name="foto"
                                class="form-control"
                            >

                        </div>

                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Batal
                    </button>

                    <button
                        type="submit"
                        name="simpan"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-save"></i>
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="js/bootstrap.bundle.min.js"></script>

</body>
</html>