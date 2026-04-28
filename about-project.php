<?php include 'includes/header.php'; ?>

<style>
    body { background-color: #f3f4f6; }
    .card-custom { 
        background: white; 
        border-radius: 15px; 
        padding: 40px; 
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin-bottom: 50px;
    }
    .section-title { font-weight: 700; margin-bottom: 15px; color: #111827; }
    .problem-statement { background-color: #fff1f2; border-radius: 8px; padding: 20px; }
    .feature-card { border-radius: 10px; padding: 20px; height: 100%; border: 1px solid transparent; }
    .tech-pill { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 12px; text-align: center; }
    .db-structure { background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 10px; padding: 20px; }
    .course-info { background-color: #eff6ff; border: 1px solid #dbeafe; border-radius: 10px; padding: 20px; }
</style>

<div class="container mt-5">
    <div class="card-custom">
        <h1 class="fw-bold mb-4">About This Project</h1>
        
        <div class="mb-5">
            <h5 class="section-title">Project Overview</h5>
            <p class="text-secondary" style="line-height: 1.6;">
                The Smart Order Management System is a comprehensive web-based solution designed to help small businesses efficiently manage their customers, orders, and staff transactions. This system eliminates the challenges of manual record-keeping by providing a centralized platform for tracking all business operations.
            </p>
        </div>

        <div class="mb-5">
            <h5 class="section-title">Problem Statement</h5>
            <div class="problem-statement">
                <p class="fw-semibold mb-2" style="color: #4b5563;">This system addresses critical business challenges:</p>
                <ul class="text-secondary mb-0">
                    <li>Lost customer records due to manual tracking</li>
                    <li>Confusion in order management and fulfillment</li>
                    <li>No accountability for staff transactions</li>
                    <li>Difficulty in generating business reports</li>
                </ul>
            </div>
        </div>

        <div class="mb-5">
            <h5 class="section-title">Key Features</h5>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="feature-card" style="background-color: #f0f9ff; border-color: #bae6fd;">
                        <h6 class="fw-bold text-dark">🔐 Authentication System</h6>
                        <p class="small text-secondary mb-0">Secure login/logout with session management and role-based access</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-card" style="background-color: #f0fdf4; border-color: #bbf7d0;">
                        <h6 class="fw-bold text-dark">👥 Customer Management</h6>
                        <p class="small text-secondary mb-0">Complete CRUD operations for managing customer information</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-card" style="background-color: #fff7ed; border-color: #fed7aa;">
                        <h6 class="fw-bold text-dark">📦 Order Processing</h6>
                        <p class="small text-secondary mb-0">Track orders with staff attribution and status monitoring</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-card" style="background-color: #fdf2f8; border-color: #fbcfe8;">
                        <h6 class="fw-bold text-dark">📊 Relational Reports</h6>
                        <p class="small text-secondary mb-0">Advanced reports showing relationships between users, customers, and orders</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <h5 class="section-title">Technology Stack</h5>
            <div class="row g-3 text-center">
                <div class="col-6 col-md-3">
                    <div class="tech-pill">
                        <span class="fw-bold d-block">React</span>
                        <small class="text-muted">Frontend Framework</small>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="tech-pill">
                        <span class="fw-bold d-block">TypeScript</span>
                        <small class="text-muted">Type Safety</small>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="tech-pill">
                        <span class="fw-bold d-block">Tailwind CSS</span>
                        <small class="text-muted">Styling</small>
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="tech-pill">
                        <span class="fw-bold d-block">LocalStorage</span>
                        <small class="text-muted">Data Storage</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <h5 class="section-title">Database Structure</h5>
            <div class="db-structure">
                <p class="small text-muted mb-3">The system implements a relational database with three tables:</p>
                <ul class="list-unstyled mb-0 small">
                    <li class="mb-2"><span class="text-primary fw-bold">• USERS:</span> Stores staff/admin credentials and information</li>
                    <li class="mb-2"><span class="text-success fw-bold">• CUSTOMERS:</span> Contains customer details and contact information</li>
                    <li><span class="fw-bold" style="color: #a855f7;">• ORDERS:</span> Links customers and users with foreign keys, tracking all transactions</li>
                </ul>
            </div>
        </div>

        <div>
            <h5 class="section-title">Course Information</h5>
            <div class="course-info small">
                <p class="mb-1"><strong>Course:</strong> ITEL 203 – Web Systems and Technologies</p>
                <p class="mb-1"><strong>Section:</strong> BSINFO 2A</p>
                <p class="mb-1"><strong>Project:</strong> Group Performance Task #2</p>
                <p class="mb-0"><strong>Date:</strong> April 21, 2026</p>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>