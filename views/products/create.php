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
    <div class="card border-0 shadow-sm" style="max-width: 800px; margin: 0 auto;">
        <div class="card-header bg-white border-0 pb-0">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="fw-bold text-gradient mb-0">
                        <i class="fas fa-plus-circle me-2"></i>Create New Product
                    </h2>
                    <p class="text-muted">Fill the form to add a new masterpiece</p>
                </div>
                <a href="/products" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Back
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <!-- Hanya satu form yang digunakan -->
            <form action="products/store" method="POST">
                <div class="mb-4">
                    <label class="form-label fw-bold">Product Name</label>
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter product name" required>
                    <div class="form-text">Give it a catchy name</div>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Describe your product"></textarea>
                </div>
                
                <div class="mb-4">
                    <label class="form-label fw-bold">Price</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light">Rp</span>
                        <input type="number" name="price" class="form-control form-control-lg" placeholder="0.00" step="0.01" required>
                    </div>
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                    <button type="reset" class="btn btn-outline-secondary me-md-2">
                        <i class="fas fa-redo me-2"></i>Reset
                    </button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>Save Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .form-control-lg {
        padding: 0.75rem 1rem;
        border-radius: 0.5rem;
    }
    
    .card-header {
        border-radius: 0.5rem 0.5rem 0 0 !important;
    }
</style>
</body>