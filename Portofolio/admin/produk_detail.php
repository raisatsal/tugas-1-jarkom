<?php
class Studies {
    private $koneksi;

    public function __construct() {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function getAllStudies() {
        $sql = "SELECT s.*, l.nama as nama_level 
                FROM studies s 
                INNER JOIN level l ON s.idlevel = l.id 
                ORDER BY s.tahun_lulus ASC";
        return $this->koneksi->query($sql)->fetchAll();
    }

    public function getStudies($id) {
        $sql = "SELECT * FROM studies WHERE id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        return $ps->fetch();
    }

    public function simpan($data) {
        $sql = "INSERT INTO studies (nama, idlevel, keterangan, tahun_lulus, foto_sekolah) VALUES (?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}