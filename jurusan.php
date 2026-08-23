<?php
include 'koneksi.php';

class Jurusan {
    private $db;

    public function __construct() {
        $this->db = Koneksi::hubungkan();
    }

    public function ambilSemua() {
        $sql = mysqli_query($this->db, "SELECT * FROM jurusan ORDER BY kode_jurusan");
        return $sql;
    }
}
?>