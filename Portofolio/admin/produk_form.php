<?php
$id = $_GET['id'] ?? null;
$obj_studies = new Studies();
$obj_level = new Level(); // Pastikan kamu punya model Level
$data_level = $obj_level->getAllLevel();

$edit = $id ? $obj_studies->getStudies($id) : null;
?>

<div class="container mt-4">
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white"><?= $id ? 'Edit' : 'Tambah' ?> Riwayat Studi</div>
        <form method="POST" action="studies_controller.php" enctype="multipart/form-data">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nama Sekolah</label>
                    <input type="text" name="nama" class="form-control" value="<?= $edit['nama'] ?? '' ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenjang Pendidikan</label>
                    <select name="idlevel" class="form-select" required>
                        <option value="">-- Pilih Jenjang --</option>
                        <?php foreach($data_level as $lvl) { 
                            $sel = ($edit['idlevel'] == $lvl['id']) ? 'selected' : '';
                            echo "<option value='{$lvl['id']}' $sel>{$lvl['nama']}</option>";
                        } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Lulus</label>
                    <input type="number" name="tahun_lulus" class="form-control" value="<?= $edit['tahun_lulus'] ?? '' ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control"><?= $edit['keterangan'] ?? '' ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Sekolah</label>
                    <input type="file" name="foto_sekolah" class="form-control">
                    <?php if($edit) echo "<small class='text-muted'>File saat ini: {$edit['foto_sekolah']}</small>"; ?>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="proses" value="<?= $id ? 'ubah' : 'simpan' ?>" class="btn btn-primary">Simpan</button>
                <input type="hidden" name="idx" value="<?= $id ?>">
                <a href="index.php?hal=studies_list" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>