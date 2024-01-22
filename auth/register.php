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

    <style> <?php include './assets/css/Login.css'; ?> </style>

    <div class='container'>

        <a href="<?= url('./') ?>">Back</a>

        <div class="header">
        <h1>Productivity</h1>
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
            <input type="submit" class="btn btn-success btn-sm" value="register" />   
            </div>
        </form>

        <p><?php if ($error !== '') echo $error; ?></p>

        <div class="forgot-pass"><span>Already have an account?<a class="" href="<?= url('auth/login.php') ?>">Sign In</a></span></div>
    </div>

<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>