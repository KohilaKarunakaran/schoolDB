<?php

require_once('../db_config.php');
$studentID = $_GET['studentID'];
$query = "SELECT * FROM students WHERE studentID = :studentID LIMIT 1";
$result = $db_connection->prepare($query);
$result->execute([
    'studentID' => $studentID
]);
$result = $result->fetch();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit a Record</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<br>
<div class="container">
<form method="post" action="update.php">
<div class="form-group row">
<label for="studentID" class="clo-sm-2 col-form-label">StudentID</lable>
<div class="col-sm-10">
<input type="number" readonly class="form-control" id="studentID" name="studentID" value="<?php echo $result['studentID'] ?>">
</div>
</div>
<div class="form-group row">
<label for="firstName" class="clo-sm-2 col-form-label">FirstName</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $result['firstName'] ?>">
</div>
</div>
<div class="form-group row">
<label for="lastName" class="clo-sm-2 col-form-label">LastName</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $result['lastName'] ?>">
</div>
</div>
<div class="form-group row">
<label for="dateOfBirth" class="clo-sm-2 col-form-label">DOB</lable>
<div class="col-sm-10">
<input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="<?php echo $result['dateOfBirth'] ?>">
</div>
</div>
<div class="form-group row">
<label for="class" class="clo-sm-2 col-form-label">class</lable>
<div class="col-sm-10">
<input type="text" class="form-control" id="class" name="class" value="<?php echo $result['class'] ?>">
</div>
</div>
<button type="submit" name="updateRecord" class="btn btn-success">Update Record</button>
</form>

</div>

</body>

</html>