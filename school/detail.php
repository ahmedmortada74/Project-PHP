<?php
require_once "template/navbar.php";
require_once "template/header.php";
require_once "admin/crud/connection.php";
require_once "Student.php";


if (isset($_GET['student_id'])) {
    $studentId = $_GET['student_id'];


    $select = $connection->prepare('SELECT * FROM students WHERE student_id = :student_id');
    $select->bindParam(':student_id', $studentId, PDO::PARAM_INT);
    $select->execute();
    $student = $select->fetch(PDO::FETCH_CLASS, 'Student');
?>
<?php
    if ($student) {
      ?>  
        <div class="card" style="width: 100rem;">
                <img src="admin/images/<?=$student->student_img?>" class="card-img-top" alt="Student Image">
                <div class="card-body">
                    <p class="card-text"><?=$student->student_name?></p>
                    <p class="card-text"><?=$student->birth_date?></p>
                    <p class="card-text"><?=$student->courses?></p>
                    <a href="detail.php" class="btn btn-success">View</a>
                </div>
            </div>
            <?php}
    else {
        echo 'Student not found.';
    }
} else {
    echo 'Student ID not provided.';
}
?>
<?php
require_once "template/footer.php";
?>
