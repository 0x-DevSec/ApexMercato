<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Apex Journalist | Market Intelligence</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">

<style>
body {
    background: radial-gradient(circle at top, #0b1d26, #000);
    color: #fff;
    font-family: 'Orbitron', sans-serif;
}

.navbar {
    background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);
}

.glass {
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(14px);
    border-radius: 18px;
    border: 1px solid rgba(255,255,255,0.15);
}

.table thead {
    color: #00f2ff;
}

.table-hover tbody tr {
    transition: 0.25s;
}

.table-hover tbody tr:hover {
    background: rgba(0,242,255,0.12);
}

.search-input {
    background: #000;
    border: 2px solid #00f2ff;
    color: #fff;
}

.search-input::placeholder {
    color: #aaa;
}

.stat-card {
    text-align: center;
    padding: 20px;
    transition: 0.3s;
}

.stat-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 0 25px #00f2ff;
}
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark px-4">
    <span class="navbar-brand fw-bold text-info">📰 JOURNALIST DATA HUB</span>
</nav>

<div class="container my-5">

    <!-- TITLE -->
    <div class="text-center mb-5">
        <h1 class="text-info">Market Intelligence</h1>
        <p class="text-secondary">Advanced eSport contract & transfer analysis</p>
    </div>

    <!-- STATS -->
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="glass stat-card">
                <h6>Active Players</h6>
                <h3>24</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="glass stat-card">
                <h6>Total Transfers</h6>
                <h3>12</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="glass stat-card">
                <h6>Average Annual Cost</h6>
                <h3>410K €</h3>
            </div>
        </div>
    </div>

    <!-- SEARCH -->
    <div class="row mb-4">
        <div class="col-md-6 mx-auto">
            <input type="text"
                   id="searchInput"
                   class="form-control form-control-lg search-input text-center"
                   placeholder="🔍 Search player, team or role">
        </div>
    </div>

    <!-- DATA TABLE -->
    <div class="glass p-4">
        <h4 class="text-info mb-3">📊 Player & Coach Costs</h4>

        <table class="table table-dark table-hover align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role / Style</th>
                    <th>Team</th>
                    <th>Salary</th>
                    <th>Clause</th>
                    <th>Annual Cost</th>
                </tr>
            </thead>
            <tbody id="dataTable">
                <tr class="searchable">
                    <td>s1mple</td>
                    <td>AWP</td>
                    <td>G2</td>
                    <td>350 000 €</td>
                    <td>1 200 000 €</td>
                    <td>450 000 €</td>
                </tr>
                <tr class="searchable">
                    <td>ZywOo</td>
                    <td>Rifler</td>
                    <td>Vitality</td>
                    <td>300 000 €</td>
                    <td>900 000 €</td>
                    <td>390 000 €</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- TRANSFER LOG -->
    <div class="glass p-4 mt-5">
        <h4 class="text-warning mb-3">📜 Transfer History (Private)</h4>
        <ul class="list-group list-group-flush">
            <li class="list-group-item bg-transparent text-white searchable">
                TR-2025-0021 — s1mple — G2 ➜ Vitality — 1.2M €
            </li>
            <li class="list-group-item bg-transparent text-white searchable">
                TR-2025-0034 — NiKo — FaZe ➜ G2 — 950K €
            </li>
        </ul>
    </div>

</div>

<!-- SEARCH SCRIPT -->
<script>
document.getElementById('searchInput').addEventListener('keyup', function () {
    const value = this.value.toLowerCase();
    document.querySelectorAll('.searchable').forEach(el => {
        el.style.display = el.textContent.toLowerCase().includes(value) ? '' : 'none';
    });
});
</script>

</body>
</html>
