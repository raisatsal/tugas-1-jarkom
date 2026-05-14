<?php 
ob_start();

include "koneksi.php";

/* =========================
   SIMPAN DATA
========================= */
if(isset($_POST['simpan'])){

    $nama = $_POST['nama'];

    $stmt = $dbh->prepare("
        INSERT INTO pendidikan (nama_jenjang)
        VALUES (?)
    ");

    $stmt->execute([$nama]);

    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pendidikan</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">

    <div class="card shadow border-0 rounded-4 overflow-hidden">

        <!-- HEADER -->
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center py-3">

            <h5 class="mb-0 fw-bold">
                <i class="bi bi-mortarboard-fill me-2"></i>
                My Studies (Riwayat Pendidikan)
            </h5>

            <button 
                class="btn btn-light btn-sm fw-semibold"
                data-bs-toggle="modal"
                data-bs-target="#modalTambah"
            >
                <i class="bi bi-plus-lg"></i>
                Tambah Jenjang
            </button>

        </div>

        <!-- BODY -->
        <div class="card-body bg-white">

            <div class="table-responsive">

                <table class="table table-hover align-middle text-center">

                    <thead class="table-primary">

                        <tr>
                            <th width="10%">No</th>
                            <th>Nama Jenjang Pendidikan</th>
                            <th width="20%">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                    <?php
                    $no = 1;

                    $stmt = $dbh->query("
                        SELECT * FROM pendidikan
                        ORDER BY id DESC
                    ");

                    while($d = $stmt->fetch(PDO::FETCH_ASSOC)){
                    ?>

                        <tr>

                            <td>
                                <?= $no++; ?>
                            </td>

                            <td class="fw-semibold">
                                <?= $d['nama_jenjang']; ?>
                            </td>

                            <td>

                                <!-- EDIT -->
                                <a 
                                    href="jenis_edit.php?id=<?= $d['id']; ?>"
                                    class="btn btn-warning btn-sm text-white"
                                >
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <!-- HAPUS -->
                                <a 
                                    href="jenis_hapus.php?id=<?= $d['id']; ?>"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus data?')"
                                >
                                    <i class="bi bi-trash"></i>
                                </a>

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
     MODAL TAMBAH
========================= -->
<div class="modal fade" id="modalTambah" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content border-0 shadow rounded-4 overflow-hidden">

            <form method="POST">

                <!-- HEADER -->
                <div class="modal-header bg-primary text-white">

                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-plus-circle me-2"></i>
                        Tambah Jenjang Pendidikan
                    </h5>

                    <button 
                        type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal"
                    ></button>

                </div>

                <!-- BODY -->
                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Nama Jenjang
                        </label>

                        <input 
                            type="text"
                            name="nama"
                            class="form-control"
                            placeholder="Contoh: SMA / Kuliah"
                            required
                        >

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