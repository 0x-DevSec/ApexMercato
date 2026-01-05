<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Player | Apex Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">

<style>
body {
    background: radial-gradient(circle at top, #0a0a0a, #000);
    color: #fff;
    font-family: 'Orbitron', sans-serif;
}
.glass {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    border-radius: 16px;
    border: 1px solid rgba(255,255,255,0.15);
}
.btn-danger {
    box-shadow: 0 0 12px #ff003c;
}
.form-control, .form-select {
    background: #0d0d0d;
    color: #fff;
    border: 1px solid #333;
}
.form-control:focus, .form-select:focus {
    border-color: #ff003c;
    box-shadow: none;
}
</style>
</head>

<body>

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-8">

<div class="glass p-4">
<h3 class="text-danger mb-4">
    <i class="bi bi-controller"></i> Add New Player
</h3>

<form method="POST" action="../actions/add_player.php" class="row g-3">

<!-- NAME -->
<div class="col-md-6">
    <label class="form-label">Real Name</label>
    <input type="text" name="name" class="form-control" required>
</div>

<!-- PSEUDO -->
<div class="col-md-6">
    <label class="form-label">Pseudo</label>
    <input type="text" name="pseudo" class="form-control" required>
</div>

<!-- ROLE -->
<div class="col-md-6">
    <label class="form-label">Role</label>
    <select name="role" class="form-select" required>
        <option value="">Select role</option>
        <option>AWP</option>
        <option>IGL</option>
        <option>Support</option>
        <option>Entry Fragger</option>
        <option>Lurker</option>
    </select>
</div>

<!-- NATIONALITY -->
<div class="col-md-6">
    <label class="form-label">Nationality</label>
    <input type="text" name="nationality" class="form-control" required>
</div>

<!-- EMAIL -->
<div class="col-md-6">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control" required>
</div>

<!-- TEAM -->
<div class="col-md-6">
    <label class="form-label">Team</label>
    <select name="team_id" class="form-select">
        <option value="">Free Agent</option>
        <!-- PHP LOOP TEAMS -->
        <!-- <option value="1">G2</option> -->
    </select>
</div>

<hr class="my-4">

<!-- MARKET VALUE -->
<div class="col-md-6">
    <label class="form-label">Market Value (€)</label>
    <input type="number" step="0.01" name="market_value" class="form-control" required>
</div>

<!-- MONTHLY SALARY -->
<div class="col-md-6">
    <label class="form-label">Monthly Salary (€)</label>
    <input type="number" step="0.01" name="monthly_salary" class="form-control" required>
</div>

<!-- SIGNING BONUS -->
<div class="col-md-6">
    <label class="form-label">Signing Bonus (€)</label>
    <input type="number" step="0.01" name="signing_bonus" class="form-control" required>
</div>

<div class="col-12 text-end mt-4">
    <button class="btn btn-danger px-4">
        <i class="bi bi-plus-circle"></i> Create Player
    </button>
</div>

</form>

</div>
</div>
</div>
</div>

</body>
</html>
