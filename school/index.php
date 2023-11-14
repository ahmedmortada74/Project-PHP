<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
 .card-text {
    background-color: #f0f0f0; 
    color: #333; 
    padding: 10px; 
    box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); 
  }

 
  span {
    color: #ff5733; 
  }

  
  p {
    color: #0077b6; 
  }
    </style>
</head>
<body>
<?php
require_once "template/navbar.php";
require_once "template/header.php";
require_once "admin/crud/connection.php";
require_once "Student.php";
?>
<div class="container">
    <div class="row text-center">
        <br>
        <h1 style="color: red;">Welcome To South Valley University</h1>
    </div>
    <div class="row">
        <?php
        $select = $connection->prepare('SELECT * FROM students');
        $select->execute();
        $students = $select->fetchAll(PDO::FETCH_CLASS, 'Student');
        
        foreach ($students as $student) {
            ?>
            <div class="card" style="width: 20rem;">
                <img src="admin/images/<?=$student->student_img?>" class="card-img-top" alt="Student Image">
                <div class="card-body">
                <span>Name :</span> <p class="card-text"><?=$student->student_name?></p>
                <span>birth Date:</span>  <p class="card-text"><?=$student->birth_date?></p>
                <span>courses:</span> <p class="card-text"><?=$student->courses?></p>
                <span>Status:</span>  <p class="card-text"><?=$student->student_status?></p>
                    <a href="detail.php" class="btn btn-success">View</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php
require_once "template/footer.php";
?>

</body>
</html>