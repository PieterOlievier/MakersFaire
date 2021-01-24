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
  
        <label class="order-label" for="naam">Naam</br>
                    <input class="order-input" type="text" id="naam" name="naam"  required value="<?php if (!empty($_POST['naam'])) {
                                                                                                                                                            echo $_POST['naam'];
                                                                                                                                                        } ?>">

                    
        </label>

        <label class="order-label" for="voornaam">Voornaam</br>
                    <input class="order-input" type="text" id="voornaam" name="voornaam"  required value="<?php if (!empty($_POST['voornaam'])) {
                                                                                                                                                            echo $_POST['voornaam'];
                                                                                                                                                        } ?>">

                    
        </label>

        <label class="order-label" for="email">email</br>
                    <input class="order-input" type="email" id="email" name="email"  required value="<?php if (!empty($_POST['email'])) {
                                                                                                                                                            echo $_POST['email'];
                                                                                                                                                        } ?>">

                    
        </label>

        <p class="order-form__adress">Waar mogen wij jouw kit leveren?</p>

       <div class="order-adres-number">                                                                                                                                                 

        <label  for="adres">adres</br>
                    <input class="order-input" type="text" id="adres" name="adres"  required value="<?php if (!empty($_POST['adres'])) {
                                                                                                                                                            echo $_POST['adres'];
                                                                                                                                                        } ?>">

                    
        </label>

        <label  for="nr">nr</br>
                    <input class="order-input__number" type="text" id="nr" name="nr"  required value="<?php if (!empty($_POST['nr'])) {
                                                                                                                                                            echo $_POST['nr'];
                                                                                                                                                        } ?>">

                    
        </label>
        </div>

        <div class="order-code-city">

        <label class="order-label" for="postcode">postcode</br>
                    <input class="order-input__code" type="text" id="postcode" name="postcode"  required value="<?php if (!empty($_POST['postcode'])) {
                                                                                                                                                            echo $_POST['postcode'];
                                                                                                                                                        } ?>">

                    
        </label>

        <label class="order-label" for="stad">stad/gemeente</br>
                    <input class="order-input__city" type="text" id="stad" name="stad"  required value="<?php if (!empty($_POST['stad'])) {
                                                                                                                                                            echo $_POST['stad'];
                                                                                                                                                        } ?>">

                    
        </label>
        </div>
        
        <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
                <input type="submit" value="registreer" class="register-submit">
            </div>
        </div>
        
    </form>




</div>

