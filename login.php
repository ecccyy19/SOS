<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'config.php';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $password = $_POST['password'];


    $user = $userObj->login($username, $password);
    
    if ($user) {
    
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['fullname'] = $user['fullname'];
        $_SESSION['role'] = $user['role'];
        
    
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Order Management - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body class="bg-light d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                <div class="card border-0 shadow-sm p-4" style="border-radius: 15px;">
                    <h2 class="text-center fw-bold mb-1">Smart Order Management</h2>
                    <p class="text-center text-muted small mb-4">Sign in to your account</p>

                    <?php if($error): ?>
                        <div class="alert alert-danger py-2 text-center small mb-3" style="background-color: #fee2e2; border: 1px solid #fecaca; color: #991b1b;">
                            <?= $error ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Username</label>
                            <input type="text" name="username" class="form-control py-2" placeholder="Enter username" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label small fw-bold">Password</label>
                            <input type="password" name="password" class="form-control py-2" placeholder="Enter password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold py-2 shadow-sm">Sign In</button>
                    </form>

                    <p class="text-center small text-muted mt-3">
                        Don't have an account? <a href="register.php" class="text-decoration-none">Sign Up here</a>
                    </p>

                    <div class="mt-4 p-3 rounded" style="background-color: #f8fafc;">
                        <p class="small fw-bold mb-1">Demo Credentials:</p>
                        <p class="small text-muted mb-0">Admin: admin / admin123</p>
                        <p class="small text-muted mb-0">Staff: staff1 / staff123</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>