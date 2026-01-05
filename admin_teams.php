<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Apex Admin | Teams Management</title>

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
    box-shadow: 0 0 25px #00f2ff;
}
.search-input {
    background: #000;
    border: 2px solid #00f2ff;
    color: #fff;
}
.search-input::placeholder {
    color: #aaa;
}
.badge-budget {
    background: linear-gradient(45deg, #00ff99, #00cc66);
}
</style>
</head>

<body>
<div class="container-fluid">
<div class="row">

<!-- SIDEBAR -->
<aside class="col-md-2 sidebar p-3">
    <h4 class="text-success text-center">ADMIN CORE</h4>
    <hr>
    <ul class="nav flex-column">
        <li class="nav-item mb-2"><a class="nav-link text-white" href="admin_players.php">🎮 Players</a></li>
        <li class="nav-item mb-2"><a class="nav-link text-white" href="admin_coaches.php">🧠 Coaches</a></li>
        <li class="nav-item mb-2">
            <a class="nav-link text-success fw-bold" href="admin_teams.php">🛡 Teams</a>
        </li>
        <li class="nav-item mb-2"><a class="nav-link text-white" href="admin_contracts.php">📄 Contracts</a></li>
        <li class="nav-item mb-2"><a class="nav-link text-white" href="admin_transfers.php">🔥 Transfers</a></li>
    </ul>
</aside>

<!-- MAIN -->
<main class="col-md-10 p-4">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-success">🛡 Teams Management</h2>
    <a href="addteam.php" class="btn btn-outline-success">
        <i class="bi bi-plus-circle"></i> Add Team
    </a>
</div>

<!-- STATS -->
<div class="row mb-4">
    <div class="col-md-3">
        <div class="glass p-3 card-hover text-center">
            <h6>Total Teams</h6>
            <h3>6</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="glass p-3 card-hover text-center">
            <h6>Total Budget</h6>
            <h3>18M €</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="glass p-3 card-hover text-center">
            <h6>Avg Budget</h6>
            <h3>3M €</h3>
        </div>
    </div>
    <div class="col-md-3">
        <div class="glass p-3 card-hover text-center">
            <h6>Active Contracts</h6>
            <h3>22</h3>
        </div>
    </div>
</div>

<!-- SEARCH -->
<div class="row mb-3">
    <div class="col-md-6">
        <input type="text" id="searchInput"
               class="form-control form-control-lg search-input"
               placeholder="🔍 Search by team name or manager">
    </div>
</div>

<!-- TEAMS TABLE -->
<div class="glass p-4">
    <table class="table table-dark table-hover align-middle">
        <thead class="text-success">
            <tr>
                <th>Team</th>
                <th>Manager</th>
                <th>Players</th>
                <th>Budget</th>
                <th>Status</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody id="teamsTable">
            <tr class="searchable">
                <td>Karmine Corp</td>
                <td>Kamel</td>
                <td>5</td>
                <td>
                    <span class="badge badge-budget">5 000 000 €</span>
                </td>
                <td>
                    <span class="badge bg-success">Active</span>
                </td>
                <td class="text-end">
                    <a href="editteam.php?id=1" class="btn btn-sm btn-outline-success">Edit</a>
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                </td>
            </tr>
            <tr class="searchable">
                <td>G2 Esports</td>
                <td>Carlos</td>
                <td>6</td>
                <td>
                    <span class="badge badge-budget">4 200 000 €</span>
                </td>
                <td>
                    <span class="badge bg-success">Active</span>
                </td>
                <td class="text-end">
                    <a href="#" class="btn btn-sm btn-outline-success">Edit</a>
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
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
