<?php
class Member{
    //member1 var
    private $koneksi;
    //member2 konstruktor
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    //member3 fungsionalitas
    public function cekLogin($data){
        $sql =
        "SELECT * FROM member WHERE username = ? AND password = SHA1(MD5(?))";
        //prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
        $rs = $ps->fetch();//ambil 1 baris data
        return $rs;
    }
    //member3 fungsi u/ mendapatkan data user
    public function getMember($id){
        $sql =
        "SELECT * FROM member WHERE id = ?";
        //PDO prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }
}