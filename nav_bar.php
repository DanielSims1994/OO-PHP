<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Daniel Sims</title>
    <?php include("index_PHP.php"); ?>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <ul>
        <li> <a class="active" href="index.php">Home </a></li>
        <?php
        session_start();
        if(isset($_SESSION['email'])):
        ?>
            <li class="sign_up_in"> <a href="account.php"><?php echo $_SESSION['name']; ?></a></li>
            <li class="sign_up_in"><a href="log_out.php">Log out</a></li>
        <?php 
         endif;
         if($_SESSION ['status'] === 'Administrator'):
        ?>
            <!-- admin features -->
        <?php 
        elseif (!isset($_SESSION['email'])):
        ?>
            <li class="sign_up_in"><a href="sign_in.php">Log in </a></li>
            <li class="sign_up_in"> <a href="sign_up.php">Sign up </a></li>
        <?php 
        endif;
        ?>
    </ul>
    </body>
</html>

