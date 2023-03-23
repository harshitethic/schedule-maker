<?php
require_once 'includes/auth.php';

if (isLoggedIn()) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (attemptLogin($username, $password)) {
        header("Location: index.php");
        exit();
    } else {
        $errorMessage = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f8fa;
            color: #14171a;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #fff;
            padding: 1rem;
            border-bottom: 1px solid #e1e8ed;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 1rem;
        }

        nav ul li a {
            text-decoration: none;
            color: #1da1f2;
            font-weight: bold;
        }

        main {
            max-width: 600px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        form label,
        form input {
            display: block;
            margin: 0.5rem 0;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <h1>Login</h1>

        <?php if (isset($errorMessage)): ?>
            <p style="color: red;"><?php echo htmlspecialchars($errorMessage); ?></p>
        <?php endif; ?>

        <form action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>