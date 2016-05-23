
<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Daniel Sims</title>
<?php 
    session_start();
    include("nav_bar.php");
    include("account.php"); 
?>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
<?php
    if(isset($_SESSION['email'])){
        header('Location: http://localhost/website_OO/index.php');		
    } else {
?>

    <div class="sign_up_and_in_container">
      <form method = "POST" action = "sign_in.php">
        <Fieldset class = "field_wrapper">
          <h1 id="account_header"> Log in </h1>
          <input type="text" name = "email" id="email" placeholder = "Email" value="<?php echo $_POST['email_login']; ?>"/> 
          <br/> 
          <p> Password</p>
          <input type="password" name = "password" id="password" placeholder = "Password" value="<?php echo $_POST['password_login']; ?>"/> 
          <br />
          <br />
          <input id="button_login" type="submit" name="submit" value="Log-In">	
        </Fieldset>
      </form>
    </div>
<?php

    if(isset($_POST['submit'])):
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if($email == '' && $password == ''):
            $errMsg .= 'Please fill in both fields.';
        endif;

        if($errMsg == ''):
            $login = new User_session($email, $password);
        endif;
        echo $errMsg;
    endif;
}
?>
    </body>
</html>