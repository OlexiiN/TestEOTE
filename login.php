<?php

    session_start();
    if (isset($_SESSION['logged']) ) {
        header('Location: index.php');
        exit();
    }
    
    $secret = password_hash("starwars", PASSWORD_DEFAULT);
    $secret_admin = password_hash("lordvader", PASSWORD_DEFAULT);
    
    if (isset($_POST['user']) OR isset($_POST['password'])){
            
        $is_form_valid= true;
        
        $user = trim($_POST['user']);
    	$password = trim($_POST['password']);
    	$password_hash = password_hash($password, PASSWORD_DEFAULT);
    	
        // verify special chars in username
    	if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $user) OR strlen($user) > 12){
            $is_form_valid = false;
        }
        
        // ecape html entities
        $user_valid = htmlentities(htmlentities($user, ENT_QUOTES, "UTF-8"));
    	if($user != $user_valid OR $password != $password_valid){
            $is_form_valid = false;
        }
        
        if($user_valid == 'admin'){
            if( password_verify($password,  $secret_admin) ){
                $is_form_valid = true;
            }
        } else{
            if( password_verify($password,  $secret) ){
            $is_form_valid = true;
            } else {
            $is_form_valid = false;
            }
        }
        
        
        if ($is_form_valid){
            $_SESSION['logged'] = true;
            $_SESSION['user'] = $user;
            header('Location: index.php');
        }
        
        
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EotE Roller - log in</title>

    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    
</head>
<body>

<nav class="navbar">
    <div class="container">

        <a class="navbar-brand" href="/">
            <img alt="Brand" src="img/logo.png" id="logo_art">
        </a>

    </div>
</nav>

    <div class="container">
        <div id="login_box" class= "form-group">
        <form action="login.php" id="login_form" method="post">
            
            <label for="user" class="info_text">Enter Username</label>
            <input type="text" id="user" name="user" class="form-control" value=
                <?php if (isset($_POST['user']) )
                        echo $_POST['user'];
                      else
                        echo "";
                ?>>
            <br>
            
            <label for="password" class="info_text">Enter Password</label>
            <input type="password" id="password" name="password" class="form-control">
            <br>
            
            <?php
            if (isset($is_form_valid) AND $is_form_valid==false){
                echo "<div class='alert alert-danger' role='alert'>Username or password invalid.</div>";
            }
            ?>
            <br>
            <button type="submit" class="btn btn-success btn-large pull-right">&nbsp;&nbsp;Log in&nbsp;&nbsp;</button>
            <div class="clearfix"></div>
        </form>
        </div>
    </div>

</body>

</html>