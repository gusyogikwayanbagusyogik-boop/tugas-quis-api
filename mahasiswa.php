<?php
include 'koneksi.php';

class Mahasiswa {
    private $db;
    public $NIM;
    public $nama;
    public $kode_jurusan;
    public $gender;
    public $tempat;
    public $tanggal_lahir;
    public $alamat;
    public $email;
    public $no_hp;

    public function __construct() {
        $this->db = Koneksi::hubungkan();
    }

    public function tambah() {
        $sql = "INSERT INTO mahasiswa (NIM, nama, kode_jurusan, gender, tempat, tanggal_lahir, alamat, email, no_hp)
                VALUES ('$this->NIM', '$this->nama', '$this->kode_jurusan', '$this->gender', 
                        '$this->tempat', '$this->tanggal_lahir', '$this->alamat', '$this->email', '$this->no_hp')";
        return mysqli_query($this->db, $sql);
    }

    public function ambilSemua() {
        $sql = mysqli_query($this->db, "
            SELECT m.*, j.nama_jurusan 
            FROM mahasiswa m 
            LEFT JOIN jurusan j ON m.kode_jurusan = j.kode_jurusan
            ORDER BY m.NIM ASC
        ");
        return $sql;
    }

 
    public function ambilSatu($nim) {
        $nim = mysqli_real_escape_string($this->db, $nim);
        $sql = mysqli_query($this->db, "SELECT * FROM mahasiswa WHERE NIM = '$nim'");
        return mysqli_fetch_assoc($sql);
    }

   
    public function edit() {
        $sql = "UPDATE mahasiswa SET
                    nama = '$this->nama',
                    kode_jurusan = '$this->kode_jurusan',
                    gender = '$this->gender',
                    tempat = '$this->tempat',
                    tanggal_lahir = '$this->tanggal_lahir',
                    alamat = '$this->alamat',
                    email = '$this->email',
                    no_hp = '$this->no_hp'
                WHERE NIM = '$this->NIM'";
        return mysqli_query($this->db, $sql);
    }

   
    public function hapus($nim) {
        $nim = mysqli_real_escape_string($this->db, $nim);
        $sql = "DELETE FROM mahasiswa WHERE NIM = '$nim'";
        return mysqli_query($this->db, $sql);
    }
}
?>