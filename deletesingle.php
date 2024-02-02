<?php
     require_once 'functions/helpers.php';
     require_once 'functions/pdo_connection.php';
     require_once 'functions/auth.php';

     if(isset($_GET['post_id'])){
      {
            $query = "DELETE FROM posts  WHERE id = ? ;";
            $statement = $pdo->prepare($query);
            $statement->execute([$_GET['post_id']]);
      }
     redirect("./");
}

?>