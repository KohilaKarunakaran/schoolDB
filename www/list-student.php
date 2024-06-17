<?php

require_once('../db_config.php');

    $query = "SELECT * FROM students";

    $results = $db_connection->query($query);

    ?>
    <select name="class" id="">
      <?php
      foreach ($results as $result) {
        echo "<option value=" . $result['classID'] . ">" . $result['className'] . "</option>";

      }
      ?>
      </select>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List of students</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/all.css">
    </head>

    <body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-info">
  <div class="container-fluid">
            <h1 class="display-1 text-center">SCHOOLDB</h1>
            <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="#">Students</a>
      </li>
     <li class="nav-item">
        <a class="nav-link active" href="#">classes</a>
      </li>
            </div>
</nav>
            <div class="container">
            <a href="add-student.php" class="btn btn-info">Add new student</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>STUDENTID</th>
                        <th>FIRSTNAME</th>
                        <th>LASTNAME</th>
                        <th>DOB</th>
                        <th>CLASS</th>
                        
</tr>
</thead>
<tbody>
<?php

foreach ($results as $result) {
?>
<tr>
<td>
<?php echo $result['studentID'] ?>
</td>
<td>
<?php echo $result['firstName'] ?>
</td>
<td>
<?php echo $result['lastName'] ?>
</td>
<td>
<?php echo $result['dateOfBirth'] ?>
</td>
<td>
<?php echo $result['class'] ?>
</td>
<td>
<a href="edit-student.php?studentlID=<?php echo $result['studentID'] ?>"><i class = "fas fa-edit"></i></a>
</td>
<td>
<a href="delete-student.php?studentID=<?php echo $result['studentID'] ?>"><i class = "fas fa-trash-alt"></i></a>
</td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
    </body>
    </html>