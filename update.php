<?php

require_once 'config.php';        
require_once 'classes/Customer.php'; 


if (!isset($conn)) {
    die("Database connection missing. Check config.php");
}


$custObj = new Customer($conn); 

$customer = null;


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $customer = $custObj->getById($id); 
    
    
    if (!$customer) {
        die("Customer not found!");
    }
} else {

    header("Location: customers.php");
    exit();
}
?>

<div class="container mt-4">
    <div class="card shadow-sm border-0 p-4">
        <h5 class="fw-bold">Edit Customer</h5>
        <form action="process_update.php" method="POST">
            <input type="hidden" name="id" value="<?= $customer['id'] ?>">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="small fw-bold">Full Name *</label>
                    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($customer['name']) ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="small fw-bold">Email *</label>
                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($customer['email']) ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="small fw-bold">Phone *</label>
                    <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($customer['phone']) ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="small fw-bold">Address *</label>
                    <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($customer['address']) ?>" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success px-4">Update Customer</button>
            <a href="customers.php" class="btn btn-secondary px-4">Cancel</a>
        </form>
    </div>
</div>