<?php
require_once __DIR__ . '/../config/Database.php';  // Pastikan pathnya benar
require_once 'Model.php';

class ProductModel extends Model {
    public function getAllProducts() {
        $query = 'SELECT * FROM products';
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; // Return array kosong jika null
    }

    public function getProductById($id) {
        // Query untuk mengambil produk berdasarkan ID
        $query = "SELECT * FROM products WHERE id = :id";
    
        // Menjalankan query dengan parameter yang benar
        $stmt = $this->db->query($query, ['id' => $id]);  // Pastikan parameter 'id' adalah integer
    
        // Mengembalikan hasil
        return $stmt->fetch();
    }
    

    public function createProduct($data) {
        // Query untuk memasukkan data produk
        $query = 'INSERT INTO products (name, description, price) VALUES (:name, :description, :price)';
        
        // Persiapkan query
        $stmt = $this->db->prepare($query);

        // Mengikat parameter ke statement
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':price', $data['price']);
    
        // Menjalankan query yang sudah dipersiapkan
        return $stmt->execute();
    }

    public function updateProduct($id, $data) {
        $query = "UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id";
        $stmt = $this->db->query($query, array_merge($data, ['id' => $id]));
        return $stmt->rowCount() > 0;  // Mengecek apakah ada perubahan data
    }

    public function deleteProduct($id) {
        $query = 'DELETE FROM products WHERE id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>