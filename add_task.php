<?php
$task = $_POST['task'] ?? '';
if ($task) {
    $tasks = json_decode(file_get_contents('tasks.json'), true) ?? [];
    $tasks[] = $task;
    file_put_contents('tasks.json', json_encode($tasks));
}
header("Location: index.php");
