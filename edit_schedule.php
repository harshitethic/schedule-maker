<?php
require_once 'includes/auth.php';
requireLogin();

function getSchedule($index)
{
    $schedules = json_decode(file_get_contents('schedules.json'), true);
    return $schedules[$index] ?? null;
}

function updateSchedule($index, $title, $date, $time)
{
    $schedules = json_decode(file_get_contents('schedules.json'), true);
    $schedules[$index] = [
        'title' => $title,
        'date' => $date,
        'time' => $time,
    ];
    file_put_contents('schedules.json', json_encode($schedules));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    
    updateSchedule($index, $title, $date, $time);
    header('Location: dashboard.php');
    exit;
}

$index = $_GET['id'] ?? null;
$schedule = getSchedule($index);

if (!$schedule) {
    header('Location: dashboard.php');
    exit;
}
?>

<!-- Add HTML for the edit_schedule.php form -->
