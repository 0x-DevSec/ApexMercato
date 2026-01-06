<?php

require_once __DIR__ . '/../repositories/CoachRepository.php';
require_once __DIR__ . '/../classes/Coach.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}

// Basic validation
$requiredFields = [
    'name',
    'email',
    'nationality',
    'coaching_style',
    'experience_years',
    'monthly_salary',
    'travel_fees'
];

foreach ($requiredFields as $field) {
    if (empty($_POST[$field])) {
        die('Missing required field: ' . $field);
    }
}

$coach = new Coach(
    $_POST['name'],
    $_POST['email'],
    $_POST['nationality'],
    $_POST['coaching_style'],
    (int) $_POST['experience_years'],
    (float) $_POST['monthly_salary'],
    (float) $_POST['travel_fees'],
    !empty($_POST['team_id']) ? (int) $_POST['team_id'] : null
);

$repository = new CoachRepository();
$repository->save($coach);


header('Location: ../admin_coaches.php');
exit;
