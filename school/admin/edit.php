<?php
session_start(); 

if (empty($_SESSION['username'])) {
    header("Location: login.php");  
    exit; 
}

require_once "template/nav.php";
require_once "template/header2.php";
require_once "crud/connection.php";
require_once "../Student.php";
 
if ($_SERVER['REQUEST_METHOD']  == 'GET' && !empty($_GET['id']))
{
    require_once "crud/connection.php";
require_once "../Student.php";
}


$select = $connection -> prepare('SELECT *FROM students WHERE id = ?');
$select -> execute ([$_GET['id']]);
$select -> setFetchMode(PDO::FETCH_CLASS ,'Student');
$student =$select -> fetch();
?>

<div class="container">  
  <form id="contact" action="crud/update.php" method="post" enctype="multipart/form-data">
    <h3>ADD STUDENT</h3>
    <h4>Contact us today, and get reply with in 24 hours!</h4>


  <fieldset>
    <input type="hidden" name="id" value="<?= $student->id ?>">
</fieldset>


    <fieldset>
      <input placeholder="Full Name" type="text" tabindex="1" required autofocus name="student_name" value =" <?= $student-> student_name?>">
    </fieldset>


    <fieldset>
    <label for="avatar">Choose a profile picture:</label>
    <input type="file" id="" name="student_image" value =" <?= $student-> student_img?>"  />
    </fieldset>
    

    <fieldset>
    <label for="birthday">Birth Date:</label>
    <input type="date" id="birthday" name="student_birthday" value =" <?= $student-> birth_date?>">
   </fieldset>
    
   <fieldset> 
    <label for="student_courses">Select Course:</label>
    <select id="student_courses" name="student_courses" tabindex="1" required autofocus>
        <option value="HTML" <?= ($student->courses === 'html') ? 'selected' : '' ?>>HTML</option>
        <option value="CSS"   <?= ($student->courses === 'css') ? 'selected' : '' ?>>CSS</option>
        <option value="PHP"   <?= ($student->courses === 'php ') ? 'selected' : '' ?>>PHP</option>
        <option value="PHP"   <?= ($student->courses === 'java') ? 'selected' : '' ?>>JAVA</option>
    </select>
</fieldset>
          
<fieldset>
    <legend>Student Status</legend>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="student_status" id="available" value="available"  <?= ($student->student_status === 'available') ? 'checked' : '' ?>>
        <label class="form-check-label" for="available">
            Available
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="student_status" id="not_available" value="not available"<?= ($student->student_status === 'not available') ? 'checked' : '' ?>>
        <label class="form-check-label" for="not_available">
            Not Available
        </label>
    </div>
</fieldset>
     
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Add Student</button>
    </fieldset>
  </form>
 
  
</div>
<!-- <?php

// require_once "templete/footer.php";
?> -->