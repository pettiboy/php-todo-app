<?php
    // Create connection
    $conn = new mysqli("localhost", "root", "");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $q = "SELECT * FROM todo.todos";

    $result = $conn->query($q);
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body>
    <div class="m-5">
        <h1 class="m-5">Mera TODO App</h1>

        <?php if ($_GET && $_GET["toggledId"]) { ?>

        <div class="alert alert-success" role="alert">
            TODO with id <?php echo $_GET["toggledId"] ?> was toggled!
        </div>

        <?php } ?>

        <div class="m-5 container">
            <div class="row">
                <?php while($row = $result->fetch_assoc()) { ?>
                <div class="card m-2 col-auto" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row["heading"] ?>
                        </h5>
                        <p class="card-text">
                            <?php echo $row["content"] ?>
                        </p>
                        <form method="POST" action="http://localhost/todo/toggle-todo.php">
                            <input name="todo_id" value="<?php echo $row["id"] ?>" hidden />
                            <input name="complete_status" value="<?php echo $row["complete"] ?>" hidden />
                            <input class="btn btn-primary" type="submit" value="<?php 
                                    if ($row["complete"] == 0) {
                                        echo "complete";
                                    } else {
                                        echo "Not Complete";
                                    } 
                                ?>" />
                        </form>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

        <div class="d-flex">
            <a href="http://localhost/todo/new-todo.php" class="btn btn-success btn-lg mx-auto">Add TODO</a>
        </div>


    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
</script>

</html>