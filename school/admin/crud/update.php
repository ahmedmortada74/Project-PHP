<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id'])) {
    require_once "connection.php";

    $id = $_POST['id'];
    $studentName = $_POST['student_name'];
    $birthDate = $_POST['student_birthday'];
    $courses = $_POST['student_courses'];
    $studentStatus = $_POST['student_status'];

   
    if (!empty($_FILES['student_image']['name'])) {
        $studentImage = $_FILES['student_image'];
        $imageName = $_FILES['student_image']['name'];
        $imageTmp = $_FILES['student_image']['tmp_name'];
        $imageType = $_FILES['student_image']['type'];
        
        
        move_uploaded_file($imageTmp, '../images/' . $imageName);
    } else {
        $imageName = $_POST['old_image'];
    }

    $update = $connection->prepare('UPDATE students SET student_name=?, student_img=?, birth_date=?, courses=?, student_status=? WHERE id=?');
    $update->execute([$studentName, $imageName, $birthDate, $courses, $studentStatus, $id]);

    header("location:../index.php");
}
?>