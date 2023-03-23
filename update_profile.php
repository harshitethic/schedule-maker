<?php
require_once 'includes/auth.php';
requireLogin();

$user = getUserById($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    updateUser($_SESSION['user_id'], $username, $password, $email);
    $user = getUserById($_SESSION['user_id']);
    $successMessage = "Profile updated successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <h1>Update Profile</h1>

    <?php if (isset($successMessage)): ?>
        <p><?php echo htmlspecialchars($successMessage); ?></p>
    <?php endif; ?>

    <form action="update_profile.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <br>
        <input type="submit" value="Update">
    </form>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
