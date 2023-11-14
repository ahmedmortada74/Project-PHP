<?php
session_start();
if (empty($_SESSION['username'])){
require_once "template/nav.php";
?>
<?php
require_once "template/header.php";

?>

<div class="container-fluid">
<div class="wrapper">
    <form class="form-signin" action="<?=$_SERVER['PHP_SELF']?>" method="post">       
      <h2 class="form-signin-heading">Please login</h2>
      <input type="text" class="form-control"  placeholder="User Name" required="" autofocus="" name="username" />
      <input type="password" class="form-control"  placeholder="Password" required="" name="password"/>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <br>
      <button class="btn btn-lg btn-primary btn-block container" type="submit">Login</button>   
    </form>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
require_once "template/footer.php";
if(!empty($_POST['username']) && !empty($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == 'admin' && $password =='123456'){
        $_SESSION['username'] = $username;
        header("location:index.php");
        exit;
    }else{
            echo"plase tyr agin";
    }
        } 
} else{
    echo"already loggned , go to <a href='index.php'>Dashboard</a>" ;
}
?>