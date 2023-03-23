<?php
require_once 'includes/auth.php';
requireLogin();

function saveSchedule($title, $date, $time)
{
    $schedules = json_decode(file_get_contents('schedules.json'), true);
    $schedule = [
        'title' => $title,
        'date' => $date,
        'time' => $time,
    ];
    $schedules[] = $schedule;
    file_put_contents('schedules.json', json_encode($schedules));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['send_email'])) {
        $recipient = $_SESSION['email']; // Use the logged-in user's email address
        sendSchedulesByEmail($recipient);
        echo 'Schedules sent successfully';
    } else {
        $title = $_POST['title'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        saveSchedule($title, $date, $time);
    }
}

function getSchedules()
{
    return json_decode(file_get_contents('schedules.json'), true);
}

$schedules = getSchedules();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f8fa;
        color: #14171a;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #1da1f2;
    }

    nav ul li a {
        text-decoration: none;
        color: #ffffff;
        font-weight: bold;
    }

    main {
        max-width: 800px;
        margin: 2rem auto;
        padding: 1rem;
    }

    .card {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 1rem;
        margin-bottom: 1rem;
    }

    form label,
    form input,
    form button {
        display: block;
        margin: 0.5rem 0;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #1da1f2;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    button {
        background-color: #1da1f2;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s, transform 0.3s;
    }

    button:hover {
        background-color: #0d95de;
        transform: translateY(-3px);
    }

    button:active {
        transform: translateY(-1px);
    }
</style>



</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <h1>Dashboard - Schedule Maker</h1>
        <div class="card">
        <form action="dashboard.php" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <br>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            <br>
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>
            <br>
            <button type="submit">Save Schedule</button>
        </form>

        <form action="dashboard.php" method="post">
            <input type="hidden" name="send_email" value="1">
            <button type="submit">Send Schedules to Email</button>
        </form>
    </div>
    <div class="card">
        <h2>Schedules</h2>
        <?php if (empty($schedules)): ?>
            <p>No schedules found.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($schedules as $index => $schedule): ?>
                        <tr>
                            <td><?=htmlspecialchars($schedule['title'])?></td>
                            <td><?=htmlspecialchars($schedule['date'])?></td>
                            <td><?=htmlspecialchars($schedule['time'])?></td>
                            <td>
                                <a href="edit_schedule.php?id=<?=$index?>">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
     </div>
</main>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
