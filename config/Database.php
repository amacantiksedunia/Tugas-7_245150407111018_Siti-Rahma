<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'crud_mvc';  // Ganti dengan nama database yang benar
    private $username = 'root';
    private $password = 'Rahmamalang06';
    private $conn;

    // Constructor untuk membuat koneksi
    public function __construct() {
        // Panggil fungsi connect untuk menghubungkan ke database
        $this->connect();
    }

    // Fungsi untuk melakukan koneksi ke database
    public function connect(): PDO {
        $this->conn = null;

        try {
            // Membuat koneksi menggunakan PDO
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
            // Menetapkan mode error ke exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Menangkap error koneksi dan menampilkannya
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }

    // Fungsi untuk menjalankan query SQL dengan parameter
    public function query(string $sql, array $params = []): PDOStatement {
        // Siapkan query SQL
        $stmt = $this->conn->prepare($sql);
        // Jalankan query dengan parameter
        $stmt->execute($params);
        // Kembalikan hasil query
        return $stmt;
    }

    // Fungsi untuk menutup koneksi
    public function close() {
        $this->conn = null;
    }
}
