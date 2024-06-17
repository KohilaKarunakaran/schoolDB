<?php

require_once('../db_config.php');

if (isset($_POST['createRecord'])) {
    $classID = filter_var($_POST['classID'], FILTER_SANITIZE_NUMBER_INT);
    $className = filter_var($_POST['className'], FILTER_UNSAFE_RAW);

    $query = "INSERT INTO classes (classID, className) 
          VALUES ( :classID, :className)";
    $result = $db_connection->prepare($query);
    $result->execute([
        'classID' => $classID,
        'className' => $className
    
    ]);
    $rows = $result->rowCount();
    if ($rows == 1) {
        header('Location: list-class.php');
    }else {
        $error_message ="Record creation failed";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<br>
<div class="container">
    <?php if (isset($error_message)) {
        ?>
        <div class="alert alert-success">
            <strong>Error!</strong>
            <?php echo $error_message; ?>
    </div>
    <?php
    }
    ?>
<form method="post" action="">
    <div class="form-group row">
    <label for="classID" class="clo-sm-2 col-form-label">classID</lable>
<div class="col-sm-10">
    <input type="text" class="form-control" id="classID" name="classID">
</div>
</div>
<div class="form-group row">
    <label for="className" class="clo-sm-2 col-form-label">className</lable>
<div class="col-sm-10">
<select class="form-select" id="className" name="className">
      <option>Datanomi</option>
      <option>Merkkonomi</option>
      <option>Kokki</option>
      <option>Rakennus</option>
      <option>Maalari</option>
      <option>Huis</option>
    </select>
</div>
</div>
<button type="submit" name=" createRecord" class="btn btn-success">Add Record</button>
</form>
</div>

</body>
</html>