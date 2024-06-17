<?php

require_once('../db_config.php');

if (isset($_POST['createRecord'])) {
    $studentID = filter_var($_POST['studentID'], FILTER_SANITIZE_NUMBER_INT);
    $firstName = filter_var($_POST['firstName'], FILTER_UNSAFE_RAW);
    $lastName = filter_var($_POST['lastName'], FILTER_UNSAFE_RAW);
    $dateOfBirth = filter_var($_POST['dateOfBirth'], FILTER_UNSAFE_RAW);
    $class = filter_var($_POST['class'], FILTER_SANITIZE_NUMBER_INT);
    $query = "INSERT INTO students (studentID,firstName,lastName,dateOfBirth,class) 
          VALUES ( :studentID,:firstName,:lastName,:dateOfBirth,:class)";
    $result = $db_connection->prepare($query);
    $result->execute([
        'firstName' => $firstName,
        'lastName' => $lastName,
        'dateOfBirth' => $dateOfBirth,
        'studentID' => $studentID,
        'class' => $class,
    
    ]);
    $rows = $result->rowCount();
    if ($rows == 1) {
        header('Location: list-student.php');
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
    <label for="studentID" class="clo-sm-2 col-form-label">StudentID</lable>
<div class="col-sm-10">
    <input type="number" class="form-control" id="studentID" name="studentID">
</div>
</div>
<div class="form-group row">
    <label for="firstName" class="clo-sm-2 col-form-label">FirstName</lable>
<div class="col-sm-10">
    <input type="text" class="form-control" id="firstName" name="firstName">
</div>
</div>
<div class="form-group row">
    <label for="lastName" class="clo-sm-2 col-form-label">LastName</lable>
<div class="col-sm-10">
    <input type="text" class="form-control" id="lastName" name="lastName">
</div>
</div>
<div class="form-group row">
    <label for="dateOfBirth" class="clo-sm-2 col-form-label">DOB</lable>
<div class="col-sm-10">
    <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth">
</div>
</div>
<div class="form-group row">
    <label for="class" class="clo-sm-2 col-form-label">Class</lable>
    <div class="col-sm-10">
<select class="form-select" id="class" name="class">
      <option value="classID">Datanomi</option>
      <option value="classID">Merkkonomi</option>
      <option value="classID">Kokki</option>
      <option value="classID">Rakennus</option>
      <option value="classID">Maalari</option>
      <option value="classID">Huis</option>
    </select>
</div>

</div>
</div>
<button type="submit" name="createRecord" class="btn btn-success">Add Record</button>
</form>
</div>

</body>
</html>