<?php

    $conn = new mysqli("localhost", "root", "");

    $todo_id = $_POST["todo_id"];
    $complete_status = $_POST["complete_status"];

    if ($complete_status == 1) {
        $q = "UPDATE todo.todos SET complete=0 WHERE id=$todo_id";
    } else {
        $q = "UPDATE todo.todos SET complete=1 WHERE id=$todo_id";
    }
    
    $conn->query($q);
    header('Location: '.'http://localhost/todo/index.php/?toggledId='.$todo_id);
?>