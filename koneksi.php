<?php
class Koneksi {
    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $db   = 'uts_nim';
    public static $koneksi;

    public static function hubungkan() {
        if (!isset(self::$koneksi)) {
            self::$koneksi = mysqli_connect(self::$host, self::$user, self::$pass, self::$db);
            if (!self::$koneksi) {
                die("Koneksi gagal: " . mysqli_connect_error());
            }
        }
        return self::$koneksi;
    }
}
?>