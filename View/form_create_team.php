<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Add Team | Apex Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">

<style>
body {
    background: radial-gradient(circle at top, #0a0a0a, #000);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-family: 'Orbitron', sans-serif;
}

.glass {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(14px);
    border-radius: 18px;
    border: 1px solid rgba(255,255,255,0.15);
    width: 100%;
    max-width: 600px;
}

.form-control {
    background: #000;
    color: #fff;
    border: 1px solid #00f2ff;
}
.form-control::placeholder {
    color: #aaa;
}
.form-control:focus {
    background: #000;
    color: #fff;
    box-shadow: 0 0 12px #00f2ff;
}

.btn-info {
    box-shadow: 0 0 18px #00f2ff;
}
</style>
</head>

<body>

<div class="glass p-5">

<h2 class="text-center text-info mb-4">
    🛡️ Create New Team
</h2>

<form method="POST" action="../actions/add_team.php">

    <div class="mb-4">
        <label class="form-label text-info">
            <i class="bi bi-shield-fill"></i> Team Name
        </label>
        <input type="text"
               name="name"
               class="form-control form-control-lg"
               placeholder="Ex: G2 Esports"
               required>
    </div>

    <div class="mb-4">
        <label class="form-label text-info">
            <i class="bi bi-person-badge-fill"></i> Manager Name
        </label>
        <input type="text"
               name="manager_name"
               class="form-control form-control-lg"
               placeholder="Ex: Carlos"
               required>
    </div>

    <div class="mb-4">
        <label class="form-label text-info">
            <i class="bi bi-currency-euro"></i> Team Budget (€)
        </label>
        <input type="number"
               step="0.01"
               name="budget"
               class="form-control form-control-lg"
               placeholder="Ex: 5000000"
               required>
    </div>

    <button type="submit" class="btn btn-info btn-lg w-100 mt-3">
        <i class="bi bi-check-circle"></i> Create Team
    </button>

</form>

</div>

</body>
</html>
