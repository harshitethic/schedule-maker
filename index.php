<?php
require_once 'includes/auth.php';
requireLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
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
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <h1>Welcome to the PHP site!</h1>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
