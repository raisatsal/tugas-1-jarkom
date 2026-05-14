<div class="card shadow-sm border-0 mt-4">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <span><i class="bi bi-controller me-2"></i> Kategori Hobi</span>
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalHobi">
            + Tambah
        </button>
    </div>

    <ul class="list-group list-group-flush">
    <?php
    $stmt = $dbh->query("SELECT * FROM hobi");
    while($h = $stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <?php echo $h['nama_hobi']; ?>

            <div>
                <a href="hobi_edit.php?id=<?php echo $h['id']; ?>" class="btn btn-warning btn-sm text-white">
                    <i class="bi bi-pencil"></i>
                </a>
                <a href="hobi_hapus.php?id=<?php echo $h['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus hobi ini?')">
                    <i class="bi bi-trash"></i>
                </a>
            </div>
        </li>
    <?php } ?>
    </ul>
</div>


<div class="modal fade" id="modalHobi" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form method="POST">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Hobi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
            <input type="text" name="nama_hobi" class="form-control" placeholder="Masukkan hobi..." required>
        </div>

        <div class="modal-footer">
          <button type="submit" name="simpan_hobi" class="btn btn-primary">Simpan</button>
        </div>
      </form>

    </div>
  </div>
</div>

<?php
if(isset($_POST['simpan_hobi'])){
    $nama = $_POST['nama_hobi'];

    $stmt = $dbh->prepare("INSERT INTO hobi (nama_hobi) VALUES (?)");
    $stmt->execute([$nama]);

    echo "<script>
        alert('Hobi berhasil ditambahkan');
        window.location='jenis_list.php';
    </script>";
}
?>

