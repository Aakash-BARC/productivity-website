<?php
     require_once 'functions/helpers.php';
     require_once 'functions/pdo_connection.php';
     require_once 'functions/auth.php';

     if(isset($_GET['detail_id'])){
      {
      $query = "SELECT pid FROM detail  WHERE id = ? ;";
      $statement = $pdo->prepare($query);
      $statement->execute([$_GET['detail_id']]);
      $detail = $statement->fetch();
      {
            $query = "DELETE FROM detail  WHERE id = ? ;";
            $statement = $pdo->prepare($query);
            $statement->execute([$_GET['detail_id']]);
      }
     }
     redirect(('single.php?post_id=') . $detail->pid);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Delete</title>
</head>
<body>
      <h1><?= $detail->pid ?></h1>
</body>
</html>