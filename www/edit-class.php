<?php

require_once('../db_config.php');
$classID = $_GET['classID'];
$query = "SELECT * FROM classes WHERE classID = :classID LIMIT 1";
$result = $db_connection->prepare($query);
$result->execute([
    'classID' => $classID
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
<form method="post" action="update-class.php">
<div class="form-group row">
<label for="classID" class="clo-sm-2 col-form-label">classID</lable>
<div class="col-sm-10">
<input type="number" readonly class="form-control" id="classID" name="classID" value="<?php echo $result['classID'] ?>">
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
<button type="submit" name="updateRecord" class="btn btn-success">Update Record</button>
</form>

</div>

</body>

</html>