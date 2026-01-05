<?php
session_start();

$users = [
    'admin' => [
        'email' => 'admin@apex.gg',
        'password' => 'admin123',
        'role' => 'admin'
    ],
    'journalist' => [
        'email' => 'journalist@apex.gg',
        'password' => 'press123',
        'role' => 'journalist'
    ]
];

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

foreach ($users as $user) {
    if ($email === $user['email'] && $password === $user['password']) {

        
        $_SESSION['user'] = [
            'email' => $email,
            'role' => $user['role']
        ];

        
        if ($user['role'] === 'admin') {
            header('Location: ../admin_dashboard.php');
            exit;
        }

        if ($user['role'] === 'journalist') {
            header('Location: ../journaliste_view.php');
            exit;
        }
    }
}

header('Location: ../login.php ');
exit;
