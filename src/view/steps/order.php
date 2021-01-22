<h1 class="hidden">Makers Faire</h1>







<div class="navigatie">
            <a class="nav-logo" href="index.php">
            <img class="nav-logo" src="assets/img/index-logo.png">
            </a>
        
            <div class="nav-items">
                <p class="nav-item">
                <a href="index.php?page=tutorial">De tutorial</a>
                </p>
                <p class="nav-item">
                <a href="index.php?page=tutorial">Bestel jouw kit</a>
                </p>
            </div>
        </div>

<div class="order-grid">

    <p class="order-title">bestel jouw kit</p>

    
    <img class="order-img" src="assets/img/header.png">


    <div class="divider-line"></div>

    <form action="index.php?page=order" method="post" class="order-form">
        <p class="form-greeting">aangenaam</p>
        <div class="form-group row<?php if (!empty($errors['email'])) echo ' has-danger'; ?>">
            <label class="register-label" for="registerUsername">Naam:</label>
            <div class="register-input">
                <input type="text" name="username" id="registerUsername" class="form-control<?php if (!empty($errors['username'])) echo ' form-control-danger'; ?>" value="<?php if (!empty($_POST['username'])) echo $_POST['username']; ?>" />
                <?php if (!empty($errors['username'])) echo '<div class="form-control-feedback">' . $errors['username'] . '</div>'; ?>
            </div>
        </div>
        <div class="form-group row<?php if (!empty($errors['email'])) echo ' has-danger'; ?>">
            <label class="register-label" for="registerUsername">Voornaam:</label>
            <div class="register-input">
                <input type="text" name="username" id="registerUsername" class="" value="<?php if (!empty($_POST['username'])) echo $_POST['username']; ?>" />
                <?php if (!empty($errors['username'])) echo '<div class="form-control-feedback">' . $errors['username'] . '</div>'; ?>
            </div>
        </div>
        <div class="order-input">
            <label class="register-label" for="registerPassword">e-mailadres</label>
            <div class="register-input">
                <input type="password" name="password" id="registerPassword" class="form-control<?php if (!empty($errors['password'])) echo ' form-control-danger'; ?>" />
                <?php if (!empty($errors['password'])) echo '<div class="form-control-feedback">' . $errors['password'] . '</div>'; ?>
            </div>
        </div>
        
        <div class="form-group row">
            <div>
                <input type="submit" value="Naar betaling" class="register-submit">
            </div>
        </div>
    </form>




</div>

