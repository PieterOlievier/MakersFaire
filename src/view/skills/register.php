<h1 class="hidden">Plan your skills</h1>
<div class="start-title">
    <p class="start-title__plan">Plan</p>
    <p class="start-title__your">your</p>
    <p class="start-title__skills">skills</p>
</div>


<section class="register">
    <h3 class="hidden">Login</h3>


    <?php if (!empty($info)) : ?>
        <div class="succesfullRegistration-message"><?php echo $info; ?></div>
    <?php endif; ?>

    
<form action="index.php?page=register" method="post" class="register-form">
        <div class="form-group row<?php if (!empty($errors['email'])) echo ' has-danger'; ?>">
            <label class="register-label" for="registerUsername">Gebruikersnaam:</label>
            <div class="register-input">
                <input type="text" name="username" id="registerUsername" class="form-control<?php if (!empty($errors['username'])) echo ' form-control-danger'; ?>" value="<?php if (!empty($_POST['username'])) echo $_POST['username']; ?>" />
                <?php if (!empty($errors['username'])) echo '<div class="form-control-feedback">' . $errors['username'] . '</div>'; ?>
            </div>
        </div>
        <div class="form-group row<?php if (!empty($errors['password'])) echo ' has-danger'; ?>">
            <label class="register-label" for="registerPassword">Password:</label>
            <div class="register-input">
                <input type="password" name="password" id="registerPassword" class="form-control<?php if (!empty($errors['password'])) echo ' form-control-danger'; ?>" />
                <?php if (!empty($errors['password'])) echo '<div class="form-control-feedback">' . $errors['password'] . '</div>'; ?>
            </div>
        </div>
        <div class="form-group row<?php if (!empty($errors['confirm_password'])) echo ' has-danger'; ?>">
            <label class="register-label" for="registerConfirmPassword">Confirm Password:</label>
            <div class="register-input">
                <input type="password" name="confirm_password" id="registerConfirmPassword" class="form-control<?php if (!empty($errors['confirm_password'])) echo ' form-control-danger'; ?>" />
                <?php if (!empty($errors['confirm_password'])) echo '<div class="form-control-feedback">' . $errors['confirm_password'] . '</div>'; ?>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <input type="submit" value="registreer" class="register-submit">
            </div>
        </div>
    </form>


</section>


<div class="start-figures">
    <div class="circle-one"></div>
    <div class="circle-two"></div>
    <div class="square"></div>
    <div class="trapezium"></div>
    <div class="circle-three"></div>
    <div class="line"></div>
</div>





