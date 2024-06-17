<?php

require_once("../db_config.php");

if (!isset($_GET['classID'])) {
    header('Location: list-class.php');
    die();
} else {
    $classID = filter_var($_GET['classID'], FILTER_SANITIZE_NUMBER_INT);
    if ($classID) {
        header('Location_ list-class.php');
        die();
    } else {
        $query = "DELETE FROM classes
                   WHERE classID = :classID LIMIT 1";
        $result = $db_connection->prepare($query);
        $result->execute([
            'classID' => $classID
        ]);
        $rowsdeleted = $result->reowCount();
        if ($rowsdeleted == 1) {
            header("Location: list-class.php");
        } else {
            $error_message = "Record was not deleted.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Delete a Record</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>


<div class="container">
    <?php
    if (isset($error_message)) {
        ?>
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <?php echo $error_message; ?> Go back to <a href="list-class.php" class="alert-link">list of classes</a>
    </div>
    <?php
        }
        ?>
        </div>
</body>
</html>