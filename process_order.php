<?php
session_start();
require_once 'config.php';
require_once 'classes/order.php';

if (isset($_POST['create_order'])) {
    $orderObj = new Order($conn);

    $customer_id = $_POST['customer_id'];
    $product = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    
    
    $createdBy = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1; 

    if ($orderObj->create($customer_id, $product, $quantity, $price, $createdBy)) {
        header("Location: order_management.php?status=success");
    } else {
        
        header("Location: order_management.php?status=error");
    }
    exit();
}
?>