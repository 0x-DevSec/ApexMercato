<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Apex Admin | Transfers Engine</title>

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
    box-shadow: 0 0 30px #ff003c;
}
.search-input {
    background: #000;
    border: 2px solid #ff003c;
    color: #fff;
}
.search-input::placeholder {
    color: #aaa;
}
.badge-transfer {
    background: linear-gradient(45deg, #ff003c, #ff6600);
}
.status-pending {
    color: #ffc107;
}
.status-success {
    color: #00ff99;
}
.status-failed {
    color: #ff003c;
}
.engine-box {
    border: 2px dashed #ff003c;
}
</style>
</head>

<body>
<div class="container-fluid">
<div class="row">

<!-- SIDEBAR -->
<aside class="col-md-2 sidebar p-3">
    <h4 class="text-danger text-center">ADMIN CORE</h4>
    <hr>
    <ul class="nav flex-column">
        <li class="nav-item mb-2"><a class="nav-link text-white" href="admin_players.php">🎮 Players</a></li>
        <li class="nav-item mb-2"><a class="nav-link text-white" href="admin_coaches.php">🧠 Coaches</a></li>
        <li class="nav-item mb-2"><a class="nav-link text-white" href="admin_teams.php">🛡 Teams</a></li>
        <li class="nav-item mb-2"><a class="nav-link text-white" href="admin_contracts.php">📄 Contracts</a></li>
        <li class="nav-item mb-2">
            <a class="nav-link text-danger fw-bold" href="admin_transfers.php">🔥 Transfers</a>
        </li>
    </ul>
</aside>

<!-- MAIN -->
<main class="col-md-10 p-4">

<!-- HEADER -->
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="text-danger">🔥 Transfer Execution Engine</h2>
    <span class="badge bg-danger fs-6">FinancialEngine FINAL</span>
</div>

<!-- ENGINE -->
<div class="glass p-4 mb-4 engine-box">
    <h4 class="mb-3">⚙️ Execute Transfer</h4>
    <p class="text-muted">
        Uses <strong>FinancialEngine</strong> (final class) + PDO transaction.<br>
        If budget is insufficient, <span class="text-danger">rollback is executed</span>.
    </p>

    <form class="row g-3 mt-3">
        <div class="col-md-4">
            <label class="form-label">Player</label>
            <select class="form-select bg-dark text-white">
                <option>s1mple</option>
                <option>NiKo</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">From Team</label>
            <select class="form-select bg-dark text-white">
                <option>G2</option>
                <option>Vitality</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">To Team</label>
            <select class="form-select bg-dark text-white">
                <option>Karmine Corp</option>
                <option>Liquid</option>
            </select>
        </div>

        <div class="col-md-4">
            <label class="form-label">Transfer Amount (€)</label>
            <input type="number" class="form-control bg-dark text-white" placeholder="1 200 000">
        </div>

        <div class="col-md-4">
            <label class="form-label">Buyout Clause</label>
            <input type="number" class="form-control bg-dark text-white readonly" readonly value="1 500 000">
        </div>

        <div class="col-md-4">
            <label class="form-label">Transfer Reference</label>
            <input type="text" class="form-control bg-dark text-white readonly" readonly value="TR-2025-A91X">
        </div>

        <div class="col-12">
            <button class="btn btn-danger w-100 mt-3">
                🚨 EXECUTE TRANSFER
            </button>
        </div>
    </form>
</div>

<!-- HISTORY -->
<div class="glass p-4">
    <h4 class="mb-3">📜 Transfer History</h4>

    <input type="text" id="searchInput"
           class="form-control mb-3 search-input"
           placeholder="🔍 Search by player, team or reference">

    <table class="table table-dark table-hover align-middle">
        <thead class="text-danger">
            <tr>
                <th>Reference</th>
                <th>Player</th>
                <th>From</th>
                <th>To</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr class="searchable">
                <td>TR-2025-A91X</td>
                <td>s1mple</td>
                <td>G2</td>
                <td>Karmine Corp</td>
                <td>
                    <span class="badge badge-transfer">1 200 000 €</span>
                </td>
                <td class="status-success">SUCCESS</td>
                <td>2025-01-04</td>
            </tr>

            <tr class="searchable">
                <td>TR-2025-B44Z</td>
                <td>NiKo</td>
                <td>Vitality</td>
                <td>Liquid</td>
                <td>
                    <span class="badge badge-transfer">900 000 €</span>
                </td>
                <td class="status-failed">FAILED (Budget)</td>
                <td>2025-01-02</td>
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
