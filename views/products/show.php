<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
<div class="card shadow-sm">
    <div class="card-header bg-white">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-info-circle me-2"></i> Product Details</h4>
            <div>
                <a href="/products/edit/<?= $product['id'] ?>" class="btn btn-sm btn-warning">
                    <i class="fas fa-edit me-2"></i> Edit
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
    <?php if (isset($product)): ?>
    <!-- Jika $product ada, tampilkan data produk -->
    <div>
        <h2><?= htmlspecialchars($product['name']) ?></h2>
        <p><?= htmlspecialchars($product['description']) ?></p>
        <p>Price: Rp <?= number_format($product['price'], 2, ',', '.') ?></p>
        <p>Product ID: #<?= $product['id'] ?></p>
        <p>Product added on: <?= date('M d, Y', strtotime($product['created_at'])) ?></p>
    </div>
    <?php else: ?>
    <!-- Jika $product tidak ada, tampilkan pesan error -->
    <p>Product not found</p>
    <?php endif; ?>
        <div class="mt-4">
            <a href="/views/main.php" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i> Back to Products
            </a>
        </div>
    </div>
</div>
</body>
</html>

