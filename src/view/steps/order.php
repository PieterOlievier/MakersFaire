<h1 class="hidden">Makers Faire</h1>







<div class="navigatie">
            <a class="nav-logo" href="index.php">
            <img class="nav-logo" src="assets/img/index-logo.png">
            </a>
        
            <div class="nav-items">
                
                <a class="nav-item" href="index.php?page=tutorial">De tutorial</a>
                
                
                <a class="nav-item__active" href="index.php?page=shop">Bestel jouw kit</a>
            
            </div>
        </div>

<div class="order-grid">
    <!-- <div class="user-section"> -->

    <p class="order-title">bestel jouw kit</p>

    
    <img class="order-img" src="assets/img/header.png">


    <div class="divider-line"></div>

    <form action="index.php?page=order" method="post" class="order-form">
        <p class="form-greeting">aangenaam</p>
  
        <label class="order-label" for="naam">
            <p class="order-label__label">Naam</p>
                    <input class="order-input" type="text" id="naam" name="naam"  required value="<?php if (!empty($_POST['naam'])) {
                                                                                                                                                            echo $_POST['naam'];
                                                                                                                                                        } ?>">

                    
        </label>

        <label class="order-label" for="voornaam">
             <p class="order-label__label">Voornaam</p>
                    <input class="order-input" type="text" id="voornaam" name="voornaam"  required value="<?php if (!empty($_POST['voornaam'])) {
                                                                                                                                                            echo $_POST['voornaam'];
                                                                                                                                                        } ?>">

                    
        </label>

        <label class="order-label" for="email">
             <p class="order-label__label">email</p>
                    <input class="order-input" type="email" id="email" name="email"  required value="<?php if (!empty($_POST['email'])) {
                                                                                                                                                            echo $_POST['email'];
                                                                                                                                                        } ?>">

                    
        </label>
        <!-- </div> -->

        <!-- <div class="adress-section"> -->

        <p class="order-form__adress">Waar mogen wij jouw kit leveren?</p>

       <div class="order-adres-number">                                                                                                                                                 

        <label  for="adres">
             <p class="order-label__label">adres</p>
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

        <label class="order-label" for="postcode">
             <p class="order-label__label">postcode</p>
                    <input class="order-input__code" type="text" id="postcode" name="postcode"  required value="<?php if (!empty($_POST['postcode'])) {
                                                                                                                                                            echo $_POST['postcode'];
                                                                                                                                                        } ?>">

                    
        </label>

        <label class="order-label" for="stad">
             <p class="order-label__label-city">stad/gemeente</p>
                    <input class="order-input__city" type="text" id="stad" name="stad"  required value="<?php if (!empty($_POST['stad'])) {
                                                                                                                                                            echo $_POST['stad'];
                                                                                                                                                        } ?>">

                    
        </label>
        </div>
        
        <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
                <input type="submit" value="bestellen" class="form-submit">
            </div>
        </div>
        <!-- </div> -->
    </form>




</div>

