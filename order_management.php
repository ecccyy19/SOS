<?php 
require_once 'config.php'; 
require_once 'classes/order.php'; 
require_once 'classes/customer.php';

$orderObj = new Order($conn); 
$orders = $orderObj->getAll();

$custObj = new Customer($conn);
$all_customers = $custObj->readAll();

include 'includes/header.php'; 
?>

<div class="container-fluid mt-4 px-4">
    <?php if(isset($_GET['status']) && $_GET['status'] == 'error'): ?>
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <strong>Error!</strong> Something went wrong with the order process.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-0 text-dark">Order Management</h3>
            <p class="text-muted small mb-0">Monitor and manage your customer orders.</p>
        </div>
        <button class="btn btn-primary fw-bold px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#orderModal">
            + Create Order
        </button>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="table-responsive">
            <table class="table align-middle table-hover mb-0">
                <thead class="bg-light text-dark">
                    <tr class="small fw-bold text-uppercase text-muted">
                        <th class="ps-4 py-3">Order ID</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($orders && $orders->rowCount() > 0): ?>
                        <?php while ($row = $orders->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td class="ps-4 text-muted"><?= $row['id']; ?></td>
                            <td class="fw-bold text-dark"><?= htmlspecialchars($row['customer_name']); ?></td>
                            <td><?= htmlspecialchars($row['product']); ?></td>
                            <td><?= $row['quantity']; ?></td>
                            <td>₱<?= number_format($row['price'], 2); ?></td>
                            <td class="fw-bold text-primary">₱<?= number_format($row['total'], 2); ?></td>
                            <td>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-2">
                                    <?= $row['status']; ?> <i class="bi bi-chevron-down ms-1"></i>
                                </span>
                            </td>
                            <td><span class="text-secondary"><?= htmlspecialchars($row['staff_name'] ?? 'John Doe'); ?></span></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm text-white px-3 fw-bold me-1 rounded-2">Edit</button>
                                <button class="btn btn-danger btn-sm px-3 fw-bold rounded-2">Delete</button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="9" class="text-center py-5 text-muted">No orders found.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="orderModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <form action="process_order.php" method="POST" class="modal-content border-0 shadow-lg">
      <div class="modal-header border-0 pb-0">
          <h5 class="fw-bold text-dark">New Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body py-4">
          <div class="mb-3">
              <label class="small fw-bold text-dark mb-1">Select Customer</label>
              <select name="customer_id" class="form-select border-light-subtle shadow-sm" required>
                  <option value="">-- Choose Customer --</option>
                  <?php while($c = $all_customers->fetch(PDO::FETCH_ASSOC)): ?>
                      <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
                  <?php endwhile; ?>
              </select>
          </div>
          <div class="mb-3">
              <label class="small fw-bold text-dark mb-1">Product Name</label>
              <input type="text" name="product_name" class="form-control border-light-subtle shadow-sm" placeholder="e.g. Laptop" required>
          </div>
          <div class="row g-3">
              <div class="col-6">
                  <label class="small fw-bold text-dark mb-1">Quantity</label>
                  <input type="number" name="quantity" class="form-control border-light-subtle shadow-sm" value="1" min="1" required>
              </div>
              <div class="col-6">
                  <label class="small fw-bold text-dark mb-1">Price (₱)</label>
                  <input type="number" step="0.01" name="price" class="form-control border-light-subtle shadow-sm" placeholder="0.00" required>
              </div>
          </div>
      </div>
      <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-light px-4 fw-bold" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" name="create_order" class="btn btn-success px-4 fw-bold shadow-sm">Confirm Order</button>
      </div>
    </form>
  </div>
</div>

<?php include 'includes/footer.php'; ?>