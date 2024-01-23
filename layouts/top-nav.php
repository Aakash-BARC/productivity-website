<?php
session_start();
?>
<nav class="navbar">
        <div class="logo">Productivity</div>
        <div class="submit-container">
        <a href="<?= url('uploadinfo.php') ?>"><div class='large-button'>Post</div></a>
          <?php 
                if (!isset($_SESSION['user'])) {
                    ?>
          <a href="<?= url('auth/login.php') ?>"><div class="large-button">Log In</div></a>
            <?php
                } else { ?>
          <a  href="<?= url('auth/logout.php') ?>"><div class="large-button">Log Out</div></a>
          <?php } ?>
        </div>
        <div class="search-bar">
          <input type="text" placeholder="Search..." />
          <button>Search</button>
        </div>
</nav>