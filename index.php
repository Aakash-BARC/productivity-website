<?php
session_start();
     require_once 'functions/helpers.php';
     require_once 'functions/pdo_connection.php';
     if(isset($_SESSION['user'])){
      if(isset($_POST['option']) && isset($_POST['search']) && $_POST['search'] !== '') 
      {  $option = $_POST['option'];
       if(($_POST['option']) == 'name')
         {
           $query = "SELECT posts.* FROM `posts` JOIN users ON posts.uid = users.id WHERE INSTR(name,?) <> 0 AND users.id = ? ORDER BY posts.id DESC";
           $statement = $pdo->prepare($query);
           $statement->execute([$_POST['search'],$_SESSION['id']]);
           $posts = $statement->fetchAll();
         } elseif (($_POST['option']) == 'contact') {
           $query = "SELECT posts.* FROM `posts` JOIN users ON posts.uid = users.id WHERE INSTR(contact,?) <> 0 AND users.id = ? ORDER BY posts.id DESC";
           $statement = $pdo->prepare($query);
           $statement->execute([$_POST['search'],$_SESSION['id']]);
           $posts = $statement->fetchAll();
         } elseif (($_POST['option']) == 'date') {
           $query = "SELECT posts.* FROM `posts` JOIN users ON posts.uid = users.id WHERE INSTR(date,?) <> 0 AND users.id = ? ORDER BY posts.id DESC";
           $statement = $pdo->prepare($query);
           $statement->execute([$_POST['search'],$_SESSION['id']]);
           $posts = $statement->fetchAll();
         } else {
           $query = "SELECT posts.* FROM `posts` JOIN users ON posts.uid = users.id WHERE INSTR(description,?) <> 0 AND users.id = ? ORDER BY posts.id DESC";
           $statement = $pdo->prepare($query);
           $statement->execute([$_POST['search'],$_SESSION['id']]);
           $posts = $statement->fetchAll();
         }
      }else{
       $query = "SELECT posts.* FROM posts JOIN users ON posts.uid = users.id WHERE users.id = ? ORDER BY posts.id DESC";
       $statement = $pdo->prepare($query);
       $statement->execute([$_SESSION['id']]);
       $posts = $statement->fetchAll();
     }
     } else {
       $error =  "Login or Register to continue!";
     }
     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=p">
    <title>Productivity</title>
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css') ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/Home.css') ?>" media="all" type="text/css">    
</head>
<body>
        <?php require_once "layouts/top-nav.php"?>
        <style> <?php include 'assets/css/Home.css'; ?> </style>
        <div class="page-container">
          <div class="content-warp">
          <?php 
          if(isset($posts)) { 
            foreach ($posts as $post) { ?>
                         
              <a href="<?= url('single.php?post_id=') . $post->id ?>">
                <div class="posts">
                    <div class="post">
                      <div class="post_header">
                        <h1>
                        <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512">
                          <path fill="#161c1f" d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/>
                        </svg>
                          &nbsp;:&nbsp;<?= $post->name ?>
                        </h1>
                        <h3 class='post_date'>
                        <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512">
                          <path fill="#161c1f" d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z"/>
                        </svg>
                        &nbsp;:&nbsp;<?= $post->date ?>
                        </h3>
                        </div>
                        <div class="post_contact">
                        <h2>
                        <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                        </svg>
                          &nbsp;:&nbsp;<?= $post->contact ?>
                          </h2>
                        </div>
                        <br>
                      <h4><?= $post->description ?></h4>
                    </div>
                </div>
              </div>
              </a>
        <?php } } else {
          echo "Login or Register to continue";
        } ?>
</div>
          
                   <?php require_once "layouts/footer.php"?>                   
        </div>
<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>