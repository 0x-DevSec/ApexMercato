<!DOCTYPE html>
<html>
<head>
    <title>Add Coach</title>
</head>
<body>

<h2>Add Coach</h2>

<form action="../actions/addcoach.php" method="POST">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="nationality" placeholder="Nationality" required><br><br>
    <input type="number" name="salary" placeholder="Monthly Salary" required><br><br>
    <input type="number" name="travel_fees" placeholder="Travel Fees" required><br><br>

    <button type="submit">Add Coach</button>
</form>

</body>
</html>
