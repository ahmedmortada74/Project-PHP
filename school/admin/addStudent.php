<?php
require_once "template/header2.php";
require_once "template/nav.php";

?>

<div class="container">  
  <form id="contact" action="crud/insert.php" method="post" enctype="multipart/form-data">
    <h3>ADD STUDENT</h3>
    <h4>Contact us today, and get reply with in 24 hours!</h4>
    <fieldset>
      <input placeholder="Full Name" type="text" tabindex="1" required autofocus name="student_name">
    </fieldset>

    
    <fieldset>
    <label for="avatar">Choose a profile picture:</label>
    <input type="file" id="avatar" name="student_image"  />
    </fieldset>

    <fieldset>
    <label for="birthday">Birthday:</label>
    <input type="date" id="birthday" name="student_birthDate">
   </fieldset>

   <fieldset>
    <label for="student_courses">Select Course:</label>
    <select id="student_courses" name="student_courses" tabindex="1" required autofocus>
        <option value="HTML">HTML</option>
        <option value="CSS">CSS</option>
        <option value="PHP">PHP</option>
        <option value="JAVA">JAVA</option>
    </select>
</fieldset>

<fieldset>
    <legend>Student Status</legend>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="student_status" id="available" value="available">
        <label class="form-check-label" for="available">
            Available
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="student_status" id="not_available" value="not available">
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
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
require_once "template/footer.php";
?>