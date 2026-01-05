<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Apex eSport | Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">

<style>
body {
    height: 100vh;
    background: radial-gradient(circle at top, #0a0a0a, #000);
    font-family: 'Orbitron', sans-serif;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
}
.glass {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(15px);
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.15);
    padding: 40px;
    width: 100%;
    max-width: 420px;
}
.form-control {
    background: #000;
    border: 2px solid #ff003c;
    color: #fff;
}
.form-control:focus {
    background: #000;
    color: #fff;
    border-color: #ff003c;
    box-shadow: 0 0 15px #ff003c;
}
.btn-danger {
    box-shadow: 0 0 20px #ff003c;
}
.role-badge {
    background: linear-gradient(45deg, #ff003c, #ff6600);
}
.logo {
    font-size: 1.8rem;
    letter-spacing: 2px;
}
</style>
</head>

<body>

<div class="glass text-center">

    <!-- LOGO -->
    <div class="mb-4">
        <div class="logo text-danger fw-bold">APEX ESPORT</div>
        <small class="text-muted">Secure Access Portal</small>
    </div>

    <!-- LOGIN FORM -->
    <form action="./actions/auth.php" method="POST">
        <div class="mb-3 text-start">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="admin@apex.gg" required>
        </div>

        <div class="mb-4 text-start">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
        </div>

        <button class="btn btn-danger w-100 mb-3">
            🔐 LOGIN
        </button>
    </form>

    <!-- ROLES INFO -->
    <div class="mt-4">
        <span class="badge role-badge me-2">Admin</span>
        <span class="badge role-badge">Journalist</span>
    </div>

    <p class="text-muted mt-3 mb-0" style="font-size: 0.85rem;">
        Visitors do not require authentication
    </p>

</div>

</body>
</html>
