<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Makers Faire</title>
  <?php /* NEW */ ?>
  <?php echo $css; ?>
</head>
<div style="display: flex; align-items: center; justify-content: space-between; background: black; color: white; position: fixed; top: 0; left: 0; width: 100%; padding: 0.5em; font-size: 12px; font-family: sans-serif;"><span>This is a fictional project, a student assignment for the Bachelor's degree <a href="https://devine.be" style="color: white;">Devine</a></span><button style="border: 0; padding: 0; background: black; color: white; margin: 0 0.5em; padding: 0 0.5em; cursor: pointer; font-size: 12px; " onclick="(function(btn){btn.parentNode.style.display='none'; localStorage.setItem('hide-devine-student-project-banner', '1'); return false;})(this);return false;">x</button><script>if (localStorage.getItem('hide-devine-student-project-banner') === '1') document.currentScript.parentNode.style.display = 'none';</script></div>
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
  <!-- <script type="text/javascript" src="skrollr.js"></script>
	<script type="text/javascript">
	var s = skrollr.init();
	</script> -->
</body>

</html>