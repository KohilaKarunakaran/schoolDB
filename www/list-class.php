<?php

require_once('../db_config.php');

    $query = "SELECT * FROM classes";

    $results = $db_connection->query($query);

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List of classes</title>
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
</nav><br>
            <div class="container">
            <a href="add-class.php" class="btn btn-info">Add new classes</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>CLASSID</th>
                        <th>CLASSNAME</th>
                        
                        
</tr>
</thead>
<tbody>
<?php

foreach ($results as $result) {
?>
<tr>
<td>
<?php echo $result['classID'] ?>
</td>
<td>
<?php echo $result['className'] ?>
</td>
<td>
<a href="edit-class.php?classID=<?php echo $result['classID'] ?>"><i class = "fas fa-edit"></i></a>
</td>
<td>
<a href="delete-class.php?classID=<?php echo $result['classID'] ?>"><i class = "fas fa-trash-alt"></i></a>
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