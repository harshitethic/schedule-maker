<?php
session_start();

function isLoggedIn()
{
    return isset($_SESSION['username']);
}

function requireLogin()
{
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

function authenticate($username, $password)
{
    $users = json_decode(file_get_contents('users.json'), true);

    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $user['email'];
            return true;
        }
    }

    return false;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (authenticate($username, $password)) {
        header('Location: dashboard.php');
        exit;
    } else {
        $errorMessage = 'Invalid username or password';
    }
}
?>
