<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['username'])){
require_once "template/nav.php";

require_once "template/header2.php";
?>

<div class="row p-5">
<?php require_once "addStudent.php"; ?>
 </div>
 <div class="row p-5">
<?php require_once "allStudent.php"; ?>
</div>

 

<?php
require_once "template/footer.php";
}else{
    header("location:login.php");
}
?>
</body>
</html>