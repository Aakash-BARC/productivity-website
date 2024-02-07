<?php
session_start();
     require_once 'functions/helpers.php';
     require_once 'functions/pdo_connection.php';
     if(isset($_POST['option']) && isset($_POST['search']) && $_POST['search'] !== '') 
         {  $option = $_POST['option'];
            if(($_POST['option']) == 'user'){
            $query = "SELECT posts.*, users.username FROM posts JOIN users ON posts.uid = users.id WHERE INSTR(username,?) <> 0 ORDER BY id DESC";
            $statement = $pdo->prepare($query);
            $statement->execute([$_POST['search']]);
            $posts = $statement->fetchAll();
            } elseif(($_POST['option']) == 'name') {
            $query = "SELECT posts.*, users.username FROM posts JOIN users ON posts.uid = users.id WHERE INSTR(name,?) <> 0 ORDER BY id DESC";
            $statement = $pdo->prepare($query);
            $statement->execute([$_POST['search']]);
            $posts = $statement->fetchAll();
          } elseif (($_POST['option']) == 'contact') {
            $query = "SELECT posts.*, users.username FROM posts JOIN users ON posts.uid = users.id WHERE INSTR(contact,?) <> 0 ORDER BY id DESC";
            $statement = $pdo->prepare($query);
            $statement->execute([$_POST['search']]);
            $posts = $statement->fetchAll();
          } elseif (($_POST['option']) == 'date') {
            $query = "SELECT posts.*, users.username FROM posts JOIN users ON posts.uid = users.id WHERE INSTR(date,?) <> 0 ORDER BY id DESC";
            $statement = $pdo->prepare($query);
            $statement->execute([$_POST['search']]);
            $posts = $statement->fetchAll();
          } else {
            $query = "SELECT posts.*, users.username FROM posts JOIN users ON posts.uid = users.id WHERE INSTR(description,?) <> 0 ORDER BY id DESC";
            $statement = $pdo->prepare($query);
            $statement->execute([$_POST['search']]);
            $posts = $statement->fetchAll();
          }
       }else{
        $query = "SELECT posts.*, users.username FROM posts JOIN users ON posts.uid = users.id ORDER BY id DESC";
        $statement = $pdo->prepare($query);
        $statement->execute();
        $posts = $statement->fetchAll();
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
        <?php require_once "layouts/admin-top-nav.php"?>
        <style> <?php include 'assets/css/Home.css'; ?> </style>
    <?php foreach ($posts as $post) { ?>
                         
      <a href="<?= url('single.php?post_id=') . $post->id ?>">
        <div class="posts">
            <div class="post">
            <div class="post_header">
            <h1>
                <svg xmlns="http://www.w3.org/2000/svg" height="35" width="35" viewBox="0 0 512 512">
                    <path fill="#161c1f" d="M399 384.2C376.9 345.8 335.4 320 288 320H224c-47.4 0-88.9 25.8-111 64.2c35.2 39.2 86.2 63.8 143 63.8s107.8-24.7 143-63.8zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm256 16a72 72 0 1 0 0-144 72 72 0 1 0 0 144z"/>
                </svg>
                <?= $post->username ?>
            </h1>
            <h3 class='post_date'>
                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 448 512">
                  <path fill="#161c1f" d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z"/>
                </svg>
                &nbsp;:&nbsp;<?= $post->date ?>
                </h3>
            </div>    
              <div class="post_info">
                <h3>
                <?= $post->name ?>&nbsp;|&nbsp;
                </h3>
                <div class="post_contact">
                <h3>
                 <?= $post->contact ?>
                  </h3>
                </div>
                </div>
                <br>
              <h4><?= $post->description ?></h4>
            </div>
        </div>
      </div>
      </a>
<?php } ?>
<?php require_once "layouts/footer.php"?>

<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>