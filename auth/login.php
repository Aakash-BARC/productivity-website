<?php
session_start();
     require_once '../functions/helpers.php';
     require_once '../functions/pdo_connection.php';

     $error = '';
     if(isset($_POST['email']) && $_POST['email'] !== ''
         && isset($_POST['password']) && $_POST['password'] !== '') 
         {

            $query = "SELECT * FROM users WHERE email = ?;";
            $statement = $pdo->prepare($query);
            $statement->execute([$_POST['email']]);
            $user = $statement->fetch();
            if($user !== false)
            {
                    if(password_verify($_POST['password'], $user->password))
                    {
                            $_SESSION['user'] =  $user->email;
                            $_SESSION['id'] = $user->id;
                            $_SESSION['name'] = $user->username;
                            redirect('./index.php');
                    }
                    else{
                        $error = 'password is wrong';
                    }
            }
            else{
                $error = 'Email is wrong';
            }

         }
         else{
            if(!empty($_POST))
            $error = 'All fields are required';
        }

     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= asset('./assets/css/Login.css') ?>" media="all" type="text/css">
</head>
<body>

    <style> <?php include './assets/css/Login.css'; ?> </style>

<div class='container'>
    <a href="<?= url('./') ?>">Back</a>
    
    <div class="header">
    <h1>Productivity</h1>
    </div>
  
    <form class="form-container" action="<?= url('auth/login.php') ?>" method="post">
        <div class="inputs">
      
            <div class='input'>
            <input type='email' placeholder='Enter Email...' name='email' />
            </div>

            <div class='input'>
            <input type='password' placeholder='Enter Password...' name='password' />
            </div>

        </div>
   
        <div class="submit-container">
            <input type="submit" class="btn btn-success btn-sm" value="login" />  
        </div>
    </form>
    
    <p><?php if ($error !== '') echo $error; ?></p>
    <div class="forgot-pass">Don't have an account?<span><a class="" href="<?= url('auth/register.php') ?>">Register</a></span></div>
    </div>
<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>