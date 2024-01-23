<?php
     require_once 'functions/helpers.php';
     require_once 'functions/pdo_connection.php';

     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link rel="stylesheet" href="<?= asset('assets/css/Single.css') ?>" media="all" type="text/css">    
</head>
<body>
    <style> <?php include 'assets/css/Single.css'; ?> </style>
    <?php 
        $query = "SELECT * FROM posts WHERE posts.id = ?";
        $statement = $pdo->prepare($query);
        $statement->execute([$_GET['post_id']]);
        $post = $statement->fetch();
        if ($post !== false) {
            ?>

        <button><a href="<?= url('./') ?>">Back</a></button>
        <div className="container">
            <h1>Post Information</h1>
            <h2>Name: <?= $post->name ?></h2>
      <h2>Contact no: <?= $post->contact ?></h2>
      <h2>Date and Time: <?= $post->date ?></h2>
      <h2>Description: <?= $post->description ?></h2>
      <object width='1000' height='1000'data="<?= asset($post->file) ?>"></object>
                <?php
        } else{ ?>
                    <section>post not found!</section>
                    <?php } ?>
      </div>
    </div>
</body>
</html>