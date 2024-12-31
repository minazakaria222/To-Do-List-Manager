<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>قائمة المهمات</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        ul { list-style-type: none; padding: 0; }
        ul li { background: #f4f4f4; margin: 5px 0; padding: 10px; border-radius: 5px; }
        form { margin-bottom: 20px; }
        .delete-btn { background: red; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer; }
        .delete-btn:hover { background: darkred; }
    </style>
    </head>
    <body>
    <form method="post" action="add_task.php">
    <input type="text" name="task" placeholder="Add new task" required>
    <button type="submit" name="add"> اضافة</button>
    </form>
    <ul>
        <?php
         $tasks = json_decode(file_get_contents('tasks.json'), true) ?? [];
            foreach ($tasks as $index => $task) {
                echo "<li>
                        $task 
                        <form method='post' action='delete_task.php' style='margin: 0;' onsubmit='return confirmDelete();'>
                            <input type='hidden' name='index' value='$index'>
                            <button type='submit' class='delete-btn'>حذف</button>
                        </form>
                      </li>";
            }
         ?>
    </ul>
    <script>
function confirmDelete() {
    return confirm("هل أنت متأكد من أنك تريد حذف هذه المهمة؟");
}
</script>
    </body>
</html>
