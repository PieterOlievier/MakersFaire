<main class="main">
    <h1 class="hidden">profile page</h1>
    <div class="profile-header">
        <div class="profile-border">
            <div class="profile-image"></div>
        </div>
        <div class="profile-level">
            <p class="lvl-text"></p>

        </div>
    </div>
    <div class="center-name">
        <p class="sub-text">Name</p>
    </div>


    <section class="login-grid">
        <h3 class="hidden">Login</h3>
        <p class="login-title">Login</p>


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




            <label class="login-label" for="">Paswoord</br>
                <input class="login-input" type="password" id="password" name="password" required value="<?php if (!empty($_POST['password'])) {
                                                                                                                echo $_POST['password'];
                                                                                                            } ?>">

                <span class="error"><?php if (!empty($errors['days'])) {
                                        echo $errors['days'];
                                    } ?></span>
            </label>

            <input class="login-submit" type="submit" value="login" name="button">
        </form>


        Nog geen account?</br>
        <a class="register-link" href="index.php?page=register">Registreer</a>

    </section>




    
</main>