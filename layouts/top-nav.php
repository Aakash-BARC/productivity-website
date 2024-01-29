<?php
session_start();
?>
<nav class="navbar">
        <div>
          <img class="logo" src='layouts\Capture.PNG' alt='logo'/>
          <?php
        if(!isset($_SESSION['user'])){
            ?>
            <div class="welcome-message">
            <p>Please LogIn or Register</p>  
            </div>
            <?php
        } else { ?>
            <div class="welcome-message">
            <p>Welcome, <?php echo $_SESSION['name']?></p>  
            </div>
    <?php    } ?>
        </div>
        <form action="<?= url('index.php') ?>" method="post">
        <div class="search-bar">
          <div class="search">
              <input type="text" name="search" class="searchTerm" placeholder="Search" />
                <select id="option" name="option">
                  <option value="name">Name</option>
                  <option value="contact">Contact No.</option>
                  <option value="date">Date Time</option>
                  <option value="description">Description</option>
                </select>
                <input type="submit" class="searchButton" value='Go'>
                  <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512">
                    <path fill="#ffffff" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                  </svg>
                </input>
          </div>
        </div>
        </form>
        <div class="submit-container">
          <a href="<?= url('uploadinfo.php') ?>"><button class="add">Add Post</button></a>
          <?php 
                if (!isset($_SESSION['user'])) {
                    ?>
          <a href="<?= url('auth/login.php') ?>"><button class="log">Log In</button></a>
            <?php
                } else { ?>
          <a  href="<?= url('auth/logout.php') ?>"><button class="log">Log Out</button></a>
          <?php } ?>
        </div>
</nav>