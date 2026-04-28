<?php
require_once 'config.php';
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $success = $userObj->register(
        $_POST['username'], 
        $_POST['fullname'], 
        $_POST['password'], 
        $_POST['role']
    );

    if ($success) {
        $message = "<div class='alert alert-success py-2 small'>Account created! <a href='login.php'>Login here</a></div>";
    } else {
        $message = "<div class='alert alert-danger py-2 small'>Registration failed. Username might be taken.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Smart Order Management - Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card border-0 shadow-sm p-4" style="border-radius: 15px;">
                    <h2 class="text-center fw-bold mb-1">Create Account</h2>
                    <p class="text-center text-muted small mb-4">Join Smart Order Management</p>

                    <?= $message ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="small fw-bold">Full Name</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Enter full name" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Choose a username" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Create a password" required>
                        </div>
                        <div class="mb-4">
                            <label class="small fw-bold">Role</label>
                            <select name="role" class="form-select">
                                <option value="Staff">Staff</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold py-2 mb-3">Sign Up</button>
                    </form>
                    
                    <p class="text-center small text-muted">
                        Already have an account? <a href="login.php" class="text-decoration-none">Sign In</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>