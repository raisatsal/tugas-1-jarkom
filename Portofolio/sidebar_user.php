<div class="card shadow-sm border-0 mt-4">

    <!-- HEADER -->
    <div class="card-header bg-dark text-white">

        <span>
            <i class="bi bi-controller me-2"></i>
            Kategori Hobi
        </span>

    </div>

    <!-- LIST HOBI -->
    <ul class="list-group list-group-flush">

    <?php
    $stmt = $dbh->query("
        SELECT * FROM hobi
        ORDER BY id DESC
    ");

    while($h = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>

        <li class="list-group-item">

            <i class="bi bi-check-circle-fill text-success me-2"></i>

            <?php echo $h['nama_hobi']; ?>

        </li>

    <?php } ?>

    </ul>

</div>