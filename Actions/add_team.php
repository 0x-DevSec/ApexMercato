<?php

require_once __DIR__ . '/../repositories/TeamRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $team = new Team(
        null,
        $_POST['name'],
        (float)$_POST['budget'],
        $_POST['manager_name']
    );

    $repo = new TeamRepository();
    $repo->save($team);

    header('Location: ../admin_teams.php');
    exit;
}
