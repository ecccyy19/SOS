<?php 
require_once 'config.php';
include 'includes/header.php'; 
?>

<link rel="stylesheet" href="style.css">

<div class="container mt-4">
    <h3 class="fw-bold">Dashboard</h3>
    <p class="text-muted">Welcome back, Admin User!</p>

    <div class="row row-cols-1 row-cols-md-5 g-3 mb-4">
        <div class="col">
            <div class="stat-card bg-customers h-100">
                <small>Total Customers</small>
                <h2 class="mb-0">2</h2>
            </div>
        </div>
        <div class="col">
            <div class="stat-card bg-orders h-100">
                <small>Total Orders</small>
                <h2 class="mb-0">1</h2>
            </div>
        </div>
        <div class="col">
            <div class="stat-card bg-revenue h-100">
                <small>Total Revenue</small>
                <h2 class="mb-0">₱35000.00</h2>
            </div>
        </div>
        <div class="col">
            <div class="stat-card bg-pending h-100">
                <small>Pending Orders</small>
                <h2 class="mb-0">0</h2>
            </div>
        </div>
        <div class="col">
            <div class="stat-card bg-myorders h-100">
                <small>My Orders</small>
                <h2 class="mb-0">0</h2>
            </div>
        </div>
    </div>

    <div class="card-custom">
        <h5 class="fw-bold mb-4">Recent Orders</h5>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th class="text-muted fw-semibold">Order ID</th>
                        <th class="text-muted fw-semibold">Customer</th>
                        <th class="text-muted fw-semibold">Product</th>
                        <th class="text-muted fw-semibold">Total</th>
                        <th class="text-muted fw-semibold">Status</th>
                        <th class="text-muted fw-semibold">Created By</th>
                        <th class="text-muted fw-semibold">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Maria Santos</td>
                        <td>Laptop</td>
                        <td>₱35000.00</td>
                        <td>
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">Completed</span>
                        </td>
                        <td>John Doe</td>
                        <td>4/21/2026</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>