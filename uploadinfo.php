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
    <link rel="stylesheet" href="<?= asset('assets/css/bootstrap.min.css') ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/style.css') ?>" media="all" type="text/css">
    <link rel="stylesheet" href="<?= asset('assets/css/UploadInfo.css') ?>" media="all" type="text/css">    
</head>
<body>
    <style> <?php include 'assets/css/UploadInfo.css'; ?> </style>
    <nav class="navbar">
        <a href="<?= url('./') ?>">
                <div class="back">
                        <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 256 512">
                            <path fill="#161c1f" d="M9.4 278.6c-12.5-12.5-12.5-32.8 0-45.3l128-128c9.2-9.2 22.9-11.9 34.9-6.9s19.8 16.6 19.8 29.6l0 256c0 12.9-7.8 24.6-19.8 29.6s-25.7 2.2-34.9-6.9l-128-128z"/>
                        </svg>
                </div>
            </a>
    </nav>
    <div class="main-container">
        <div class="container">
        <form action="<?= url('uploadinfo.php') ?>" method="post" enctype="multipart/form-data">
            <img src='assets\images\upload.PNG' alt='upload' class='logo'/>
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

                <button type="submit" class="log" value="submit">Submit</button>
        </form>
        <p><?php if ($error !== '') echo $error; ?></p>
        </div>
    </div>
<script src="<?= asset('assets/js/jquery.min.js') ?>"></script>
<script src="<?= asset('assets/js/bootstrap.min.js') ?>"></script>
</body>
</html>