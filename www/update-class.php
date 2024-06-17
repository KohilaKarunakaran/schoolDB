<?php

require_once('../db_config.php');

if (isset($_POST['updateRecord'])) {

    $classID = filter_var($_POST['classID'], FILTER_SANITIZE_NUMBER_INT);
    $className = filter_var($_POST['className'], FILTER_UNSAFE_RAW);
    $query = "UPDATE classes SET className=:className
WHERE classID =:classID";
$result = $db_connection->prepare($query);
$result->execute([
'classID' => $classID,
'className' => $className,
]);

$rows = $result->rowCount();
if ($rows == 1) {
     header('Location: list-class.php');
}else {
    $error_message ="Updating record failed";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Create a Record</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<br>
<div class="container">
<?php 
if (isset($error_message)) {
?>
<div class="alert alert-success">
<strong>Error!</strong>
<?php echo $error_message; ?>
</div>
<?php
}
?>
</div>
</body>
</html>