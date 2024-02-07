<?php
     require_once '../functions/helpers.php';
     require_once '../functions/pdo_connection.php';

    $error = '';
     if(isset($_POST['username']) && $_POST['username'] !== ''
         && isset($_POST['email']) && $_POST['email'] !== ''
         && isset($_POST['password']) && $_POST['password'] !== '') 
         {

                    $query = "SELECT * FROM users WHERE email = ?;";
                    $statement = $pdo->prepare($query);
                    $statement->execute([$_POST['email']]);
                    $user = $statement->fetch();
                    if($user === false)
                    {
                        $query = "INSERT INTO users SET username = ?, email = ?, password = ?;";
                        $statement = $pdo->prepare($query);
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $statement->execute([$_POST['username'], $_POST['email'], $password]);
                        redirect('auth/login.php');
                    }
                    else{
                        $error = 'This email already exists';
                    
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
    <title>Register</title>
    <link rel="stylesheet" href="<?= asset('./assets/css/Login.css') ?>" media="all" type="text/css">
</head>
<body>

    <style> <?php include '../assets/css/Login.css'; ?> </style>

    <div class='container'>
    <div class="back-container">
    <a href="<?= url('./') ?>">
        <div class="back">
                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 256 512">
                    <path fill="#161c1f" d="M9.4 278.6c-12.5-12.5-12.5-32.8 0-45.3l128-128c9.2-9.2 22.9-11.9 34.9-6.9s19.8 16.6 19.8 29.6l0 256c0 12.9-7.8 24.6-19.8 29.6s-25.7 2.2-34.9-6.9l-128-128z"/>
                </svg>
        </div>
    </a>
</div>
        <div class="header">
            <img class="logo" src='..\assets\images\Register.PNG' alt='logo'/>
        </div>

        <form class="form-container" action="<?= url('auth/register.php') ?>" method="post">
            <div class="inputs">

                <div class='input'>
                <input required type='text' placeholder='Enter Name...' name='username' />
                </div>    
                
                <div class='input'>
                <input required type='email' placeholder='Enter Email...' name='email' />
                </div>
                
                <div class='input'>
                <input required type='password' placeholder='Enter Password...' name='password' />
                </div>
        
            </div>
            
            <div class="submit-container">
                <button type="submit" class="log" value="register" >Register</button>   
            </div>
        </form>

        <p><?php if ($error !== '') echo $error; ?></p>

        <div class="forgot-pass"><span>Already have an account?<a class="" href="<?= url('auth/login.php') ?>">Sign In</a></span></div>
    </div>

<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>