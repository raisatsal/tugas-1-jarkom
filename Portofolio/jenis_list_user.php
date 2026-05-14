<?php 
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pendidikan</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">

    <div class="card shadow-sm border-0">

        <!-- HEADER -->
        <div class="card-header bg-dark text-white">

            <h5 class="mb-0">
                <i class="bi bi-mortarboard-fill me-2"></i>
                My Studies (Riwayat Pendidikan)
            </h5>

        </div>

        <!-- BODY -->
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th width="10%">No</th>
                            <th>Nama Jenjang Pendidikan</th>
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

                            <td>
                                <?= $d['nama_jenjang']; ?>
                            </td>

                        </tr>

                    <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>