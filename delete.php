<?php
     require_once 'functions/helpers.php';
     require_once 'functions/pdo_connection.php';
     require_once 'functions/auth.php';



     if(isset($_GET['detail_id']) && $_GET['detail_id']){

            $query = "DELETE FROM detail  WHERE id = ? ;";
            $statement = $pdo->prepare($query);
           $statement->execute([$_GET['detail_id']]);
     }
     header("location:javascript://history.go(-1)");