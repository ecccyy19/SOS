<?php
require_once 'config.php';
require_once 'classes/customer.php';

$custObj = new Customer($conn);
$editMode = false;
$addMode = false;
$editData = null;

if (isset($_GET['action']) && $_GET['action'] == 'add') {
    $addMode = true;
}

if (isset($_GET['edit_id'])) {
    $editMode = true;
    $editData = $custObj->getById($_GET['edit_id']);
}

if (isset($_GET['delete_id'])) {
    $custObj->delete($_GET['delete_id']);
    header("Location: customer_management.php");
    exit();
}

if (isset($_POST['save_customer'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $custObj->update($_POST['id'], $name, $email, $phone, $address);
    } else {
        $custObj->create($name, $email, $phone, $address);
    }
    header("Location: customer_management.php");
    exit();
}

include 'includes/header.php'; 
?>

<div class="container-fluid py-4 px-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Customer Management</h3>
        <?php if (!$editMode && !$addMode): ?>
            <a href="customer_management.php?action=add" class="btn btn-primary fw-bold px-4">+ Add Customer</a>
        <?php else: ?>
            <a href="customer_management.php" class="btn btn-secondary fw-bold px-4">Cancel</a>
        <?php endif; ?>
    </div>

    <?php if ($editMode || $addMode): ?>
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-4"><?= $editMode ? 'Edit Customer' : 'Add New Customer' ?></h5>
            <form action="customer_management.php" method="POST">
                <?php if($editMode): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($editData['id']) ?>">
                <?php endif; ?>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="small fw-bold mb-1">Full Name *</label>
                        <input type="text" name="name" class="form-control" value="<?= $editMode ? htmlspecialchars($editData['name']) : '' ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="small fw-bold mb-1">Email *</label>
                        <input type="email" name="email" class="form-control" value="<?= $editMode ? htmlspecialchars($editData['email']) : '' ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="small fw-bold mb-1">Phone *</label>
                        <input type="text" name="phone" class="form-control" value="<?= $editMode ? htmlspecialchars($editData['phone']) : '' ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="small fw-bold mb-1">Address *</label>
                        <input type="text" name="address" class="form-control" value="<?= $editMode ? htmlspecialchars($editData['address']) : '' ?>" required>
                    </div>
                </div>
                
                <div class="mt-2">
                    <button type="submit" name="save_customer" class="btn btn-success px-4 fw-bold">
                        <?= $editMode ? 'Update Customer' : 'Save Customer' ?>
                    </button>
                    <a href="customer_management.php" class="btn btn-secondary px-4 fw-bold ms-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3">#</th> <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $stmt = $custObj->readAll();
                    if($stmt && $stmt->rowCount() > 0):
                        $count = 1; 
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): 
                    ?>
                    <tr>
                        <td class="ps-4 text-muted small"><?= $count++ ?></td> 
                        
                        <td class="fw-bold text-dark"><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['phone']) ?></td>
                        <td><?= htmlspecialchars($row['address']) ?></td>
                        <td class="text-center">
                            <a href="customer_management.php?edit_id=<?= $row['id'] ?>" class="btn btn-warning btn-sm text-white px-3 fw-bold">Edit</a>
                            <a href="customer_management.php?delete_id=<?= $row['id'] ?>" class="btn btn-danger btn-sm px-3 fw-bold" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">No customers found in the database.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>