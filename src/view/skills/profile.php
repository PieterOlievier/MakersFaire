<main class="main">
    <h1 class="hidden">profile page</h1>

    

    <div class="profile-header">
        <div class="profile-border">
            
        </div>
        <div class="profile-level">
            <p class="lvl-text"></p>

        </div>
    </div>
    <div class="center-name">
        <p class="sub-text"><?php if (!empty($_SESSION['user']))
                echo ($_SESSION['user']['username']);
            ?></p>



        <?php if (empty($_SESSION['user']))
            echo '<div class="dashboard-noLogin">
                <p class="no-login__message">Gelieve eerst in te loggen
                <a class="no-login__link" href="index.php?page=login">Login</a>
                </p>
                </div>';
        ?>



      

    </div>
    <div class="badges-gallery">

    <div class="skill-days">
        <?php foreach ($current_skills as $current_skill) : ?>

            <div class="badge"><img class="badge-img" src="assets/img/<?php echo $current_skill['id']; ?>.jpg"></div>
            <p class="hidden"><?php echo $current_skill['id']; ?></p>
                         <?php endforeach; ?>
                         
    </div>
   
        
        
    </div>

    <a class="profile-logout" href="index.php?page=logout">Logout</a>
    
   
</div>
        
        

       
    </div>
</main>