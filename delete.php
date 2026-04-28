<?php
require_once 'config.php';
if (isset($_GET['customer_id'])) {
    $custObj->softDelete($_GET['customer_id']);
    header("Location: customer.php?msg=deleted");
}
if (isset($_GET['restore_id'])) {
    $custObj->restore($_GET['restore_id']);
    header("Location: customer.php?msg=restored");
}