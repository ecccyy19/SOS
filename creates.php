<?php 
require_once 'config.php'; 
require_once 'classes/customer.php'; 

$custObj = new Customer($conn); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if ($custObj->create($name, $email, $phone, $address)) {
       
        header("Location: customer_management.php?status=success"); 
        exit();
    } else {
        $error = "Nagkaroon ng problema sa pag-save.";
    }
}

include 'includes/header.php'; 
?>

<div class="container mt-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="customer_management.php">Customers</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add New</li>
      </ol>
    </nav>

    <div class="card border-0 shadow-sm p-4">
        <h4 class="fw-bold mb-4">Add New Customer</h4>
        
        <?php if(isset($error)): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $error; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="small fw-bold">Full Name *</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                </div>
                <div class="col-md-6">
                    <label class="small fw-bold">Email *</label>
                    <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
                </div>
                <div class="col-md-6">
                    <label class="small fw-bold">Phone *</label>
                    <input type="text" name="phone" class="form-control" placeholder="0912-345-6789" required>
                </div>
                <div class="col-md-12">
                    <label class="small fw-bold">Address *</label>
                    <textarea name="address" class="form-control" rows="3" placeholder="Enter complete address" required></textarea>
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-success fw-bold px-4">Save Customer</button>
                <a href="customer_management.php" class="btn btn-secondary fw-bold px-4">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>