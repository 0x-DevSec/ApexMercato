<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Apex Management | eSport Market</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background: radial-gradient(circle at top, #111 0%, #000 60%);
            color: #fff;
            font-family: 'Orbitron', sans-serif;
        }

        .navbar {
            background: linear-gradient(90deg, #0f2027, #203a43, #2c5364);
        }

        .hero {
            background: url('https://images.unsplash.com/photo-1553481187-be93c21490a9') center/cover;
            padding: 120px 20px;
            text-align: center;
        }

        .hero h1 {
            font-size: 3.5rem;
            text-shadow: 0 0 15px #00f2ff;
        }

        .glass {
            background: rgba(255,255,255,0.08);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,0.15);
        }

        .player-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .player-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 0 25px #00f2ff;
        }

        .badge-role {
            background: linear-gradient(45deg, #00f2ff, #0066ff);
        }

        .search-input {
            background: #000;
            color: #fff;
            border: 2px solid #00f2ff;
        }

        .search-input::placeholder {
            color: #aaa;
        }

        .transfer-item {
            transition: 0.3s;
        }

        .transfer-item:hover {
            background: rgba(0,242,255,0.1);
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark px-4">
    <span class="navbar-brand fw-bold">⚡ APEX MANAGEMENT</span>
    <a href="login.php" class="btn btn-outline-info btn-sm">Espace Pro</a>
</nav>

<!-- HERO -->
<section class="hero">
    <h1>GLOBAL eSPORT MARKET</h1>
    <p class="lead">Players • Teams • Transfers</p>
</section>

<div class="container my-5">

    <!-- SEARCH -->
    <div class="row mb-5">
        <div class="col-md-6 mx-auto">
            <input type="text" id="searchInput"
                   class="form-control form-control-lg search-input text-center"
                   placeholder="Search player or team...">
        </div>
    </div>

    <!-- PLAYERS -->
    <h2 class="mb-4 text-info">🎮 Active Players</h2>
    <div class="row" id="players">

        <!-- Player -->
        <div class="col-md-4 mb-4 searchable">
            <div class="glass p-4 player-card h-100">
                <h4 class="text-info">s1mple</h4>
                <span class="badge badge-role mb-2">AWP</span>
                <p class="mt-3 mb-1">🌍 Ukraine</p>
                <p class="mb-1">🏷 Team: G2</p>
                <a href="player_public.php?id=1" class="btn btn-outline-info btn-sm mt-3 w-100">
                    View Profile
                </a>
            </div>
        </div>

        <div class="col-md-4 mb-4 searchable">
            <div class="glass p-4 player-card h-100">
                <h4 class="text-info">ZywOo</h4>
                <span class="badge badge-role mb-2">Rifler</span>
                <p class="mt-3 mb-1">🌍 France</p>
                <p class="mb-1">🏷 Team: Vitality</p>
                <a href="#" class="btn btn-outline-info btn-sm mt-3 w-100">
                    View Profile
                </a>
            </div>
        </div>

    </div>

    <!-- TRANSFERS -->
    <h2 class="mt-5 mb-4 text-warning">📜 Recent Transfers</h2>
    <div class="glass p-3">
        <ul class="list-group list-group-flush">
            <li class="list-group-item bg-transparent text-white transfer-item searchable">
                <strong>s1mple</strong> — G2 ➜ Vitality
                <span class="badge bg-success float-end">COMPLETED</span>
            </li>
            <li class="list-group-item bg-transparent text-white transfer-item searchable">
                <strong>NiKo</strong> — FaZe ➜ G2
                <span class="badge bg-success float-end">COMPLETED</span>
            </li>
        </ul>
    </div>

</div>

<!-- FOOTER -->
<footer class="text-center text-secondary py-4">
    © 2026 Apex Management | Public eSport Platform
</footer>

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

