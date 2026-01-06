<?php

require_once __DIR__ . '/../repositories/PlayerRepository.php';
require_once __DIR__ . '/../classes/Player.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die('Invalid request');
}


$requiredFields = [
    'name',
    'email',
    'nationality',
    'monthly_salary',
    'signing_bonus',
    'pseudo',
    'role',
    'market_value'
];

foreach ($requiredFields as $field) {
    if (!isset($_POST[$field]) || $_POST[$field] === '') {
        die('Missing required field: ' . $field);
    }
}


$player = new Player(
    $_POST['name'],
    $_POST['email'],
    $_POST['nationality'],
    (float) $_POST['monthly_salary'],
    (float) $_POST['signing_bonus']
);

$repository = new PlayerRepository();
$repository->save($player);


header('Location: ../admin_coaches.php');
exit;
