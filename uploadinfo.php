<?php
     require_once 'functions/helpers.php';
     require_once 'functions/pdo_connection.php';
     require_once 'functions/auth.php';


     $error = '';
     if(isset($_POST['name']) && $_POST['name'] !== '' && isset($_POST['contact']) && $_POST['contact'] !== '' && isset($_POST['date']) && $_POST['date'] !== '' && isset($_POST['description']) && $_POST['description'] !== '' && isset($_FILES['image']) && $_FILES['image']['name'] !== '') 
     {    

          $allowedMimes = ['doc', 'docx','pdf'];
          $imageMime = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
          if(!in_array($imageMime, $allowedMimes))
          {
            $error = 'There is an issue';
          }

          $basePath = 'D:\xamp\htdocs\productivity';
          $image = '/assets/images/posts/' . date('Y_m_d_H_i_s') . '.' . $imageMime;
          $image_upload = move_uploaded_file($_FILES['image']['tmp_name'], $basePath . $image);
          if($image_upload !== false)
          {
          $query = "INSERT INTO posts SET name = ?, contact = ?, date = ?, description = ?, file = ?, uid = ?;";
          $statement = $pdo->prepare($query);
          $statement->execute([$_POST['name'], $_POST['contact'], $_POST['date'], $_POST['description'], $image, $_SESSION['id']]);
          } 
          redirect('./');
     }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Info</title>
    <link rel="stylesheet" href="<?= asset('assets/css/UploadInfo.css') ?>" media="all" type="text/css">    
</head>
<body>
    <style> <?php include 'assets/css/Home.css'; ?> </style>
   
    <div className="upload-info-container">
      <form action="<?= url('uploadinfo.php') ?>" method="post" enctype="multipart/form-data">
        <button><a href="<?= url('./') ?>">Back</a></button>
        <h2>Upload Information</h2>
        <label htmlFor="name">Name:</label>
            <input
            type="text"
            id="name"
            name="name"
            />

        <label htmlFor="contact">Contact No:</label>
            <input
            type="tel"
            id="contact"
            name="contact"
            />

        <label htmlFor="date">Date and Time:</label>
            <input
            type="datetime-local"
            id="date"
            name="date"
            />

        <label htmlFor="description">Description:</label>
            <textarea
            id="description"
            name="description"
            value=description
            ></textarea>

        <label htmlFor="file">Upload File:</label>
            <input
            type="file"
            id="image"
            name="image"
            />

            <input type="submit" value="submit" /> 
      </form>
      <p><?php if ($error !== '') echo $error; ?></p>
    </div>
</body>
</html>