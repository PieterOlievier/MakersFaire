<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/e2fdaa5e93.js" crossorigin="anonymous"></script>
  <title>Plan your skills - <?php echo $title; ?></title>
  <?php /* NEW */ ?>
  <?php echo $css; ?>
</head>

<body class="<?php if ($_GET['page'] == "index" || $_GET['page'] == "register") {
                echo 'start-body';
              } else {
                echo 'main-body';
              } ?>">
  <div>
    <?php
    if (!empty($_SESSION['error'])) {
      echo '<div class="error box">' . $_SESSION['error'] . '</div>';
    }
    if (!empty($_SESSION['info'])) {
      echo '<div class="info box">' . $_SESSION['info'] . '</div>';
    }
    ?>
    <?php if ($_GET['page'] !== "index") : ?>
      <header>
        <nav class="navigation">
          <ul class="nav-items">
            <li><a href="index.php?page=home" class="menu__item-link <?php if ($_GET['page'] == "home") {
                                                                        echo 'active';
                                                                      } ?>"><i class="fas fa-home"></i></a></li>
            <li><a href="index.php?page=profile" class="menu__item-link <?php if ($_GET['page'] == "treasures") {
                                                                          echo 'active';
                                                                        } ?>"><i class="fas fa-user-circle"></i></a></li>
          </ul>
        </nav>
      </header>
    <?php endif; ?>
    <?php echo $content; ?>
  </div>
  <?php echo $js; ?>
</body>

</html>