<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Add Coach | Apex Admin</title>

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
input, select {
    background: #0f0f0f !important;
    color: #fff !important;
    border: 1px solid #333 !important;
}
</style>
</head>

<body>

<div class="container mt-5">
    <div class="glass p-5 mx-auto" style="max-width: 700px;">
        <h3 class="text-danger text-center mb-4">
            🧠 Register New Coach
        </h3>

        <form action="../actions/add_coach.php" method="POST">

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <!-- Nationality -->
            <div class="mb-3">
                <label class="form-label">Nationality</label>
                <input type="text" name="nationality" class="form-control" required>
            </div>

            <!-- Coaching Style -->
            <div class="mb-3">
                <label class="form-label">Coaching Style</label>
                <input type="text" name="coaching_style" class="form-control" placeholder="Strategic, Aggressive, Defensive..." required>
            </div>

            <!-- Experience Years -->
            <div class="mb-3">
                <label class="form-label">Experience (Years)</label>
                <input type="number" name="experience_years" class="form-control" min="0" required>
            </div>

            <!-- Monthly Salary -->
            <div class="mb-3">
                <label class="form-label">Monthly Salary (€)</label>
                <input type="number" step="0.01" name="monthly_salary" class="form-control" required>
            </div>

            <!-- Travel Fees -->
            <div class="mb-4">
                <label class="form-label">Annual Travel Fees (€)</label>
                <input type="number" step="0.01" name="travel_fees" class="form-control" required>
            </div>
            <!-- Submit -->
            <div class="d-grid">
                <button type="submit" class="btn btn-danger btn-lg">
                    🚀 Create Coach
                </button>
            </div>

        </form>
    </div>
</div>

</body>
</html>
