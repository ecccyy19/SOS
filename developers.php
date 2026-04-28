<?php include 'includes/header.php'; ?>

<style>
    body { background-color: #f8f9fa; }
    .main-container { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    .dev-card { background: #f0f7ff; border-radius: 12px; padding: 30px; height: 100%; border: none; }
    .avatar-circle { width: 100px; height: 100px; background-color: #3b82f6; color: white; font-size: 32px; font-weight: bold; margin: 0 auto 20px auto; border-radius: 50%; display: flex; align-items: center; justify-content: center; }
    .resp-box { background: white; border-radius: 10px; padding: 15px; margin-top: 20px; text-align: left; min-height: 120px; }
    .detail-card { background: #f8fafc; border-radius: 10px; padding: 20px; border: 1px solid #e2e8f0; height: 100%; }
    .tech-badge { background: #2563eb; color: white; padding: 5px 15px; border-radius: 20px; font-size: 12px; font-weight: 500; margin-right: 5px; }
    .bottom-banner { background: #f0fdf4; color: #166534; padding: 15px; border-radius: 10px; text-align: center; font-size: 14px; margin-top: 30px; }
</style>

<div class="container mt-5 mb-5">
    <div class="main-container">
        <h2 class="fw-bold mb-1">Development Team</h2>
        <p class="text-muted mb-5">Meet the team behind the Smart Order Management System</p>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="dev-card text-center">
                    <div class="avatar-circle">JP</div>
                    <h5 class="fw-bold mb-1">Jewel Joy Pineda</h5>
                    <p class="text-primary small">Full Stack Developer</p>
                    <div class="resp-box shadow-sm">
                        <p class="fw-bold small mb-2">Responsibilities:</p>
                        <ul class="list-unstyled small text-muted mb-0">
                            <li>• Database design and implementation</li>
                            <li>• Authentication system development</li>
                            <li>• Backend integration</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dev-card text-center">
                    <div class="avatar-circle">JU</div>
                    <h5 class="fw-bold mb-1">Jeremy Mnash Urbano</h5>
                    <p class="text-primary small">Frontend Developer</p>
                    <div class="resp-box shadow-sm">
                        <p class="fw-bold small mb-2">Responsibilities:</p>
                        <ul class="list-unstyled small text-muted mb-0">
                            <li>• UI/UX design and implementation</li>
                            <li>• Customer management module</li>
                            <li>• Responsive layout design</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="dev-card text-center">
                    <div class="avatar-circle">EV</div>
                    <h5 class="fw-bold mb-1">Erika Clavel Veneracion</h5>
                    <p class="text-primary small">Backend Developer</p>
                    <div class="resp-box shadow-sm">
                        <p class="fw-bold small mb-2">Responsibilities:</p>
                        <ul class="list-unstyled small text-muted mb-0">
                            <li>• Order management system</li>
                            <li>• Relational data queries</li>
                            <li>• Reports generation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <h5 class="fw-bold mb-3">Project Details</h5>
        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="detail-card">
                    <p class="fw-bold small mb-3">Academic Information</p>
                    <div class="small">
                        <p class="mb-1 text-muted"><strong>Course:</strong> ITEL 203</p>
                        <p class="mb-1 text-muted"><strong>Section:</strong> BSINFO 2A</p>
                        <p class="mb-0 text-muted"><strong>Submission Date:</strong> April 21, 2026</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="detail-card">
                    <p class="fw-bold small mb-3">Project Statistics</p>
                    <div class="small">
                        <p class="mb-1 text-muted"><strong>Development Time:</strong> 2 weeks</p>
                        <p class="mb-1 text-muted"><strong>Total Features:</strong> 15+</p>
                        <p class="mb-0 text-muted"><strong>Database Tables:</strong> 3</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="detail-card p-3 mb-4" style="background: #f0f7ff;">
            <p class="fw-bold small mb-3">Technologies Used</p>
            <div class="d-flex flex-wrap gap-2">
                <span class="tech-badge">React</span>
                <span class="tech-badge">TypeScript</span>
                <span class="tech-badge">Tailwind CSS</span>
                <span class="tech-badge">LocalStorage</span>
                <span class="tech-badge">OOP Principles</span>
                <span class="tech-badge">Session Management</span>
            </div>
        </div>

        <div class="bottom-banner">
            This project demonstrates our understanding of web systems, relational databases, authentication, and modern development practices.
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>