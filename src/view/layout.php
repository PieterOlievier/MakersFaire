<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makers Faire<?php echo $title; ?></title>
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
         
      </header>
    <?php endif; ?>
    <?php echo $content; ?>
  </div>
  <?php echo $js; ?>
</body>

</html>