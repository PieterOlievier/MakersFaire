<h1 class="hidden">Plan your skills</h1>
<div class="start-title">
    <p class="start-title__plan">Plan</p>
    <p class="start-title__your">your</p>
    <p class="start-title__skills">skills</p>
</div>


<section class="login-grid">
    <h3 class="hidden">Login</h3>


    <?php if (!empty($info)) : ?>
        <div class="succesfullRegistration-message"><?php echo $info; ?></div>
    <?php endif; ?>

    <form class="login-form" method="post" action="index.php?page=login">


        <label class="login-label" for="username">Gebruikersnaam:</br>
            <input class="login-input" type="text" id="username" name="username" required value="<?php if (!empty($_POST['username'])) {
                                                                                                        echo $_POST['username'];
                                                                                                    } ?>">

            <?php if (!empty($error)) : ?>
                <div class="login-fout"><?php echo $error; ?></div>
            <?php endif; ?>

        </label>




        <label class="login-label" for="">Paswoord:</br>
            <input class="login-input" type="password" id="password" name="password" required value="<?php if (!empty($_POST['password'])) {
                                                                                                            echo $_POST['password'];
                                                                                                        } ?>">

            <span class="error"><?php if (!empty($errors['days'])) {
                                    echo $errors['days'];
                                } ?></span>
        </label>

        <input class="login-submit" type="submit" value="login" name="button">

        <div class="login-divider"> </div>

        Nog geen account?</br>
    <a class="register-link" href="index.php?page=register">Registreer</a>
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