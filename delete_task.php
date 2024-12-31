<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $index = $_POST['index']; // الحصول على الفهرس الخاص بالمهمة التي سيتم حذفها
    $tasks = json_decode(file_get_contents('tasks.json'), true) ?? [];

    if (isset($tasks[$index])) {
        unset($tasks[$index]); // حذف المهمة
        $tasks = array_values($tasks); // إعادة ترتيب الفهرس
        file_put_contents('tasks.json', json_encode($tasks)); // تحديث الملف
    }
}

header("Location: index.php");
