<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'config.php';

try {
    $query = "SELECT 
                o.id, 
                o.created_at, 
                c.name as customerName, 
                c.email as customerEmail, 
                c.phone as customerPhone,
                o.productName, 
                o.quantity, 
                o.price, 
                o.total, 
                o.status,
                u.fullname as staffName, 
                u.role as staffRole
              FROM orders o
              LEFT JOIN customers c ON o.customer_id = c.id
              LEFT JOIN users u ON o.createdBy = u.id
              ORDER BY o.id DESC";
    
    $stmt = $conn->query($query);
    $all_orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $total_orders = count($all_orders);
    $total_revenue = array_sum(array_column($all_orders, 'total'));

} catch (PDOException $e) {
    // Database error handling (keep as is)
    ?>
    <?php
    exit();
}

include 'includes/header.php'; 
?>

<style>
    body { background-color: #f4f7f6; }
    .report-card { border-radius: 12px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .summary-section { background-color: #f0f7ff; border-left: 5px solid #0d6efd; border-radius: 8px; }
    .table thead th { font-size: 11px; text-transform: uppercase; color: #6c757d; background: #f8f9fa; border: none; padding: 15px 10px; }
    .table tbody td { font-size: 13px; padding: 12px 10px; color: #333; }
    
    /* Dynamic Status Colors */
    .badge-completed { background-color: #e8f5e9; color: #2e7d32; border: 1px solid #c8e6c9; }
    .badge-pending { background-color: #fff8e1; color: #f57f17; border: 1px solid #ffecb3; }
    .badge-canceled { background-color: #ffeeb2; color: #c62828; border: 1px solid #ffcdd2; }
    
    @media print { .no-print { display: none !important; } }
</style>

<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <div>
            <h2 class="fw-bold text-dark mb-0">Transaction Reports</h2>
            <p class="text-muted small">Comprehensive overview of system activities</p>
        </div>
        <button class="btn btn-primary shadow-sm px-4 fw-bold" onclick="window.print()">
            <i class="bi bi-printer me-2"></i>Print Report
        </button>
    </div>

    <div class="row g-3 mb-4 no-print">
        <div class="col-md-3">
            <label class="small fw-bold text-muted mb-1">Filter by Status</label>
            <select class="form-select border-0 shadow-sm py-2" id="statusFilter">
                <option value="All">All Status</option>
                <option value="Completed">Completed</option>
                <option value="Pending">Pending</option>
            </select>
        </div>
        <div class="col-md-9">
            <label class="small fw-bold text-muted mb-1">Search</label>
            <input type="text" class="form-control border-0 shadow-sm py-2" placeholder="Search by customer name, product, or staff...">
        </div>
    </div>

    <div class="summary-section p-3 mb-4 shadow-sm">
        <p class="text-muted small mb-1">Filtered Results</p>
        <h5 class="mb-0 fw-bold">
            <?= $total_orders ?> orders found | <span class="text-primary">Total Revenue: ₱<?= number_format($total_revenue, 2) ?></span>
        </h5>
    </div>

    <div class="card report-card overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-3">Order ID</th>
                        <th>Date</th>
                        <th>Customer Name</th>
                        <th>Email</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Staff In-charge</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($total_orders > 0): ?>
                        <?php foreach($all_orders as $row): 
                            // Determine status class
                            $status = $row['status'] ?? 'Pending';
                            $badgeClass = 'badge-pending';
                            if (strtolower($status) == 'completed') $badgeClass = 'badge-completed';
                            if (strtolower($status) == 'canceled') $badgeClass = 'badge-canceled';
                        ?>
                        <tr>
                            <td class="ps-3 fw-bold">#<?= $row['id'] ?></td>
                            <td class="text-muted"><?= date('n/j/Y', strtotime($row['created_at'])) ?></td>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($row['customerName']) ?></td>
                            <td class="text-muted small"><?= htmlspecialchars($row['customerEmail']) ?></td>
                            <td><?= htmlspecialchars($row['productName'] ?? 'Laptop') ?></td>
                            <td><?= $row['quantity'] ?? 1 ?></td>
                            <td>₱<?= number_format($row['price'] ?? 0, 2) ?></td>
                            <td class="fw-bold text-primary">₱<?= number_format($row['total'], 2) ?></td>
                            <td>
                                <span class="badge <?= $badgeClass ?> rounded-pill px-3 py-2">
                                    <?= ucfirst($status) ?>
                                </span>
                            </td>
                            <td><?= htmlspecialchars($row['staffName'] ?? 'Admin') ?></td>
                            <td><span class="text-muted small text-uppercase fw-bold"><?= $row['staffRole'] ?? 'Staff' ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="11" class="text-center py-5">No transaction records found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>