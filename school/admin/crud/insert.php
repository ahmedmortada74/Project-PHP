<?php
session_start();
require_once "connection.php";

if (!empty($_SESSION['username'])) {
    
    $studentName = $_POST['student_name'];
    $BirthDate = $_POST['student_birthDate'];
    $Courses = $_POST['student_courses'];
    $studentStatus = $_POST['student_status'];

    $studentImage = $_FILES['student_image'];
    $imageName = $_FILES ['student_image']['name'];
    $imageTmp = $_FILES ['student_image']['tmp_name'];
    $imageType = $_FILES ['student_image'] ['type'];
      
    move_uploaded_file($imageTmp,'../images/'. $imageName);

    $insert = $connection->prepare("INSERT INTO students (student_name, student_img, birth_date, courses ,student_status) VALUES (?,?, ?, ?, ?)");
    $insert->execute([$studentName, $imageName, $BirthDate, $Courses , $studentStatus]);

    header("location:../index.php");
}
?>
