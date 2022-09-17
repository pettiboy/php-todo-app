<?php
    // Create connection
    $conn = new mysqli("localhost", "root", "");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $heading = $_POST["todoHeading"];
    $content = $_POST["todoContent"];

    $q = "INSERT INTO todo.todos (content, heading) VALUES ('$content', '$heading')";
    $conn->query($q);

    echo "Connected successfully";

    header("Location: http://localhost/todo/")
?>