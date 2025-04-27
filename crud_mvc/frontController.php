<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config/Database.php';
require_once 'Controllers/ProductController.php';

$request_uri = $_SERVER['REQUEST_URI'];  // Mendapatkan URI yang diminta
$method = $_SERVER['REQUEST_METHOD'];  // Mendapatkan metode request (GET, POST)

// Membuat instance dari ProductController
$controller = new ProductController();
$var = new DeleteProductController();

// Routing sederhana untuk menangani request
switch (true) {
    case $request_uri === '/products/create' && $method === 'GET':
        $controller->create();  // Menampilkan form create produk
        break;
        
    case $request_uri === '/products/store' && $method === 'POST':
        $controller->store();  // Menyimpan produk baru
        break;
        
    case preg_match('/^\/products\/edit\/(\d+)$/', $request_uri, $matches) && $method === 'GET':
        $controller->edit($matches[1]);  // Menampilkan form edit produk dengan ID
        break;
        
    case $request_uri === '/products' && $method === 'GET':
        $controller->index();  // Menampilkan daftar produk
        break;

    case preg_match('/^\/products\/update\/(\d+)$/', $request_uri, $matches) && $method === 'POST':
        $controller->update($matches[1]);  // Memperbarui produk dengan ID
        break;

    case preg_match('/^\/products\/delete\/(\d+)$/', $request_uri, $matches) && $method === 'POST':
        $controller->delete($matches[1]);  // Menghapus produk dengan ID
        break;
        
    default:
        http_response_code(404);  // Jika URL tidak ditemukan
        echo '404 Not Found';
        exit;
}
