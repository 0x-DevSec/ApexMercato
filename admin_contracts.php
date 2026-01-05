<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Apex Admin | Contracts Management</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">

<style>
body {
    background: radial-gradient(circle at top, #0a0a0a, #000);
    color: #fff;
    font-family: 'Orbitron', sans-serif;
}
.sidebar {
    background: linear-gradient(180deg, #050505, #111);
    min-height: 100vh;
}
.glass {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    border-radius: 16px;
    border: 1px solid rgba(255,255,255,0.15);
}
.card-hover {
    transition: 0.3s;
}
.card-hover:hover {
    transform: translateY(-6px);
    box-shadow: 0 0 25px #ffc107;
}
.search-input {
    background: #000;
    border: 2px solid #ffc107;
    color: #fff;
}
.search-input::placeholder {
    color: #aaa;
}
.badge-salary {
    background: linear-gradient(45deg, #ffcc00, #ff9900);
}
.readonly {
    opacity: 0.7;
    font-style: italic;
}
</style>
</head>

<body>
<div class="container-fluid">
<div class="row">

<!-- SIDEBAR -->
<aside class="col-md-2 sidebar p-3">
    <h4 class="text-warning text-center">ADMIN CORE</h4>
    <hr>
    <ul class="nav flex-column">
        <li class="nav-item mb-2"><a class="nav-link text-white" href="admin_players.php">🎮 Players</a></li>
        <li class="nav-item mb-2"><a class="nav-link text-white" href="admin_coaches.php">🧠 Coaches</a></li>
        <li class="nav-item mb-2"><a class="nav-link text-white" href="admin_teams.php">🛡 Teams</a></li>
        <li class="nav-item mb-2">
            <a class="nav-link text-warning fw-bold" href="admin_contracts.php">📄 Contracts</a>
        </li>
        <li class="nav-item mb-2"><a class="nav-link text-white" href="admin_transfers.php">🔥 Transfers</a></li>
    </ul>
</aside>

<!-- MAIN -->
<main class="col-md-10 p-4">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-warning">📄 Contracts Management</h2>
    <a href="addcontract.php" class="btn btn-outline-warning">
        <i class="bi bi-file-earmark-plus"></i> New Contract
    </a>
</div>

<!-- STATS -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="glass p-3 card-hover text-center">
            <h6>Total Contracts</h6>
            <h3>18</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="glass p-3 card-hover text-center">
            <h6>Active</h6>
            <h3>14</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="glass p-3 card-hover text-center">
            <h6>Expired</h6>
            <h3>4</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="glass p-3 card-hover text-center">
            <h6>Total Salaries</h6>
            <h3>9.6M €</h3>
        </div>
    </div>
</div>

<!-- SEARCH -->
<div class="row mb-3">
    <div class="col-md-6">
        <input type="text" id="searchInput"
               class="form-control form-control-lg search-input"
               placeholder="🔍 Search by name, team or UUID">
    </div>
</div>

<!-- CONTRACTS TABLE -->
<div class="glass p-4">
    <table class="table table-dark table-hover align-middle">
        <thead class="text-warning">
            <tr>
                <th>UUID</th>
                <th>Member</th>
                <th>Type</th>
                <th>Team</th>
                <th>Salary</th>
                <th>Buyout</th>
                <th>Start</th>
                <th>End</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody id="contractsTable">
            <tr class="searchable">
                <td class="readonly">CT-9F3A21</td>
                <td>s1mple</td>
                <td>Player</td>
                <td>G2</td>
                <td>
                    <span class="badge badge-salary">450 000 €</span>
                </td>
                <td>1 200 000 €</td>
                <td class="readonly">2024-01-01</td>
                <td>2026-12-31</td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-outline-warning">View</a>
                    <button class="btn btn-sm btn-outline-danger">Terminate</button>
                </td>
            </tr>

            <tr class="searchable">
                <td class="readonly">CT-1B77F9</td>
                <td>Zonic</td>
                <td>Coach</td>
                <td>Vitality</td>
                <td>
                    <span class="badge badge-salary">320 000 €</span>
                </td>
                <td>—</td>
                <td class="readonly">2023-08-01</td>
                <td>2025-07-31</td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-outline-warning">View</a>
                    <button class="btn btn-sm btn-outline-danger">Terminate</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</main>
</div>
</div>

<!-- SEARCH SCRIPT -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function () {
    const value = this.value.toLowerCase();
    document.querySelectorAll('.searchable').forEach(row => {
        row.style.display = row.textContent.toLowerCase().includes(value) ? '' : 'none';
    });
});
</script>

</body>
</html>
