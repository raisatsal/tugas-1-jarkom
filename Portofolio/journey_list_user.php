<?php 
include "koneksi.php";
?>

<div class="card shadow-sm border-0 mt-4">

    <!-- HEADER -->
    <div class="card-header bg-dark text-white">

        <h5 class="mb-0">
            <i class="bi bi-mortarboard-fill me-2"></i>
            My Education Journey
        </h5>

    </div>

    <!-- BODY -->
    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle text-center">

                <thead class="table-dark">

                    <tr>
                        <th width="7%">No</th>
                        <th width="15%">Foto</th>
                        <th>Nama Sekolah</th>
                        <th>Jenjang</th>
                        <th>Tahun Lulus</th>
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
                            <?= $no++; ?>
                        </td>

                        <!-- FOTO -->
                        <td>

                            <?php if($row['foto_sekolah']){ ?>

                                <img
                                    src="img/<?= $row['foto_sekolah']; ?>"
                                    width="90"
                                    height="70"
                                    class="img-thumbnail"
                                    style="object-fit:cover;"
                                >

                            <?php } else { ?>

                                -

                            <?php } ?>

                        </td>

                        <!-- NAMA -->
                        <td>
                            <?= $row['nama_sekolah']; ?>
                        </td>

                        <!-- JENJANG -->
                        <td>
                            <?= $row['jenjang']; ?>
                        </td>

                        <!-- TAHUN -->
                        <td>
                            <?= $row['tahun_lulus']; ?>
                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>