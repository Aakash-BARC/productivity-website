<?php
     require_once 'functions/helpers.php';
     require_once 'functions/pdo_connection.php';
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

        <style> <?php include 'assets/css/Home.css'; ?> </style>
        <?php require_once "layouts/top-nav.php"?>
        <?php
        if(!isset($_SESSION['user'])){
            ?>
            <div class="welcome-message">
            <p>Please Sign In or Register</p>  
            </div>
            <?php
        } else { ?>
            <div class="welcome-message">
            <p>welcome, <?php echo $_SESSION['name']?></p>  
            </div>
    <?php    } ?>
    <?php
                        $query = "SELECT * FROM posts";
                         $statement = $pdo->prepare($query);
                         $statement->execute();
                         $posts = $statement->fetchAll();
                         foreach ($posts as $post) { ?>
                         
    <div class="content">
        <div class="posts">
            <div class="post">
              <div class="post_header">
                <h1><a href="<?= url('single.php?post_id=') . $post->id ?>"><?= $post->name ?></a></h1>
                <h3 class='post_date'><?= $post->date ?></h3>
                </div>
                <div class="post_contact">
                <h2>
                <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/>
                </svg>
                  &nbsp;:&nbsp;<?= $post->contact ?>
                  </h2>
                </div>
              <p><?= $post->description ?></p>
            </div>
        </div>
      </div>
    </div>
<?php } ?>


<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>