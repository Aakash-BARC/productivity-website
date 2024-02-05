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