<?php
  require_once 'Controllers/ProductController.php';
// PHP routing di paling atas
$url = $_GET['url'] ?? '/';

switch ($url) {
    case 'products':
        // Menampilkan semua produk
        $controller = new ProductController();
        $controller->index();  // Fungsi index untuk menampilkan produk
        break;

    case 'products/create':
        // Menampilkan form create produk
        $controller = new ProductController();
        $controller->store();  // Fungsi create untuk menampilkan form input produk
        break;

    case 'products/store':
        // Menyimpan produk
        $controller = new ProductController();
        $controller->store();  // Fungsi store untuk menyimpan produk
        break;

        case 'products/edit':
            $id = $_GET['id'] ?? null; // Ambil id dari URL
            if ($id) {
                // Menampilkan produk berdasarkan ID
                $controller = new ProductController();
                $controller->edit($id);  // Panggil fungsi edit dengan ID produk
            } else {
                echo "Product not found!";
            }
            break;

        case 'products/update':
            $id = $_GET['id'] ?? null; // Ambil id dari URL
            if ($id) {
                
                $controller = new ProductController();
                $controller->update($id);  // Panggil fungsi update dengan ID produk
            } else {
                echo "Product not found!";
            }
            break;

        case 'products/delete/:id':
            $id = $_GET['id'] ?? null; // Ambil id dari URL
            if ($id) {
                $controller = new ProductController();
                $controller->delete($id);  // Panggil fungsi delete dengan ID produk    
            } else {
                echo "Product not found!";
            }
            break;
    // Rute lainnya
    default:
        echo "Page not found";
        break;
}

if (isset($view)) {
    require $view; 
}
?>

<!-- Bagian HTML untuk menampilkan produk -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4e73df;
            --secondary: #858796;
            --success: #1cc88a;
            --gradient-start: #4361ee;
            --gradient-end: #3a0ca3;
        }

        body {
            background-color: #f8f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .card {
            border-radius: 0.5rem;
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.5rem rgba(67, 97, 238, 0.2);
        }

        .table-responsive {
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .table {
            --bs-table-bg: transparent;
            margin-bottom: 0;
        }

        .table thead th {
            background-color: var(--primary);
            color: white;
            border: none;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            padding: 1rem;
        }

        .table tbody tr {
            border-bottom: 1px solid #f0f0f0;
        }

        .table tbody tr:last-child {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .btn {
            border-radius: 0.3rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-primary {
            background-color: var(--primary);
            border: none;
            padding: 0.5rem 1.5rem;
        }

        .btn-primary:hover {
            background-color: #3a56c8;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(67, 97, 238, 0.3);
        }

        .text-gradient {
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        .empty-state {
            background-color: white;
            border-radius: 0.5rem;
            padding: 3rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.05);
        }

        .product-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, var(--gradient-start), var(--gradient-end));
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .price-badge {
            background-color: rgba(28, 200, 138, 0.1);
            color: var(--success);
            border-radius: 50px;
            padding: 0.35rem 0.75rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0 text-gradient">
                    <i class="fas fa-boxes me-2"></i>Product Gallery
                </h2>
                <p class="text-muted mb-0">Manage your product collection</p>
            </div>
            <a href="?url=products/create" class="btn btn-primary shadow-sm">
                <i class="fas fa-plus me-2"></i> Add Product
            </a>
        </div>

        <?php if (!empty($products)): ?>
            <div class="card border-0 shadow-sm">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="py-3 ps-4">#ID</th>
                                    <th class="py-3">Product</th>
                                    <th class="py-3">Description</th>
                                    <th class="py-3 text-end pe-4">Price</th>
                                    <th class="py-3 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td class="fw-bold ps-4">#<?= $product['id'] ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="product-icon me-3">
                                                    <i class="fas fa-box"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0"><?= htmlspecialchars($product['name']) ?></h6>
                                                    <small class="text-muted">Last updated: <?= date('M d, Y', strtotime($product['created_at'])) ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-truncate" style="max-width: 250px;">
                                            <?= htmlspecialchars($product['description']) ?>
                                        </td>
                                        <td class="text-end pe-4">
                                            <span class="price-badge">
                                                Rp <?= number_format($product['price'], 0, ',', '.') ?>
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                <a href="/products/edit/<?= $product['id'] ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="/products/delete/<?= $product['id'] ?>" method="POST" class="d-inline">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Delete this product?')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="empty-state text-center py-5 my-5">
                <div class="mb-4">
                    <i class="fas fa-box-open fa-4x text-muted opacity-25"></i>
                </div>
                <h3 class="fw-bold text-muted mb-3">Your gallery is empty</h3>
                <p class="text-muted mb-4">Let's add your first product masterpiece!</p>
                <a href="?url=products/create" class="btn btn-primary px-4">
                    <i class="fas fa-plus me-2"></i> Create First Product
                </a>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple animation for buttons
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', () => {
                btn.style.transform = 'translateY(-2px)';
            });
            btn.addEventListener('mouseleave', () => {
                btn.style.transform = '';
            });
        });
    </script>
</body>
</html>
