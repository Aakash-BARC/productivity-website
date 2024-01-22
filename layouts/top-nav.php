<?php
session_start();
?>
<nav class="navbar">
        <div class="logo">Productivity</div>
        <div class="submit-container">
          <div class='large-button'><a href="<?= url('uploadinfo.php') ?>">Post</a></div>
          <?php 
                if (!isset($_SESSION['user'])) {
                    ?>
          <div class="large-button"><a href="<?= url('auth/login.php') ?>">Log In</a></div>
            <?php
                } else { ?>
          <div class="large-button"><a  href="<?= url('auth/logout.php') ?>">Log Out</a></div>
          <?php } ?>
        </div>
        <div class="search-bar">
          <input type="text" placeholder="Search..." />
          <button>Search</button>
        </div>
</nav>