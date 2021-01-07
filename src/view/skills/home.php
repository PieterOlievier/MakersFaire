<main class="main">
    <div class="flex_header">
        <div class="start-title">
            <p class="start-title__plan black-txt">Plan</p>
            <p class="start-title__your black-txt">your</p>
            <p class="start-title__skills">skills</p>
        </div>
    </div>
    <ol id="todosList">
    </ol>
    <section class="skill-progress__meters">
        <h2 class="home-title">Skills in progress</h2>




        <div class="scrollmenu">
            <div class="card">

                <div class="count">
                    <?php foreach ($skills as $skill) : ?>
                        <?php foreach ($current_skills as $current_skill) : ?>
                            <?php if ($current_skill['user_id'] === ($_SESSION['user']['id'])) : ?>
                                <?php if ($current_skill['current_skill'] === $skill['title']) : ?>
                                    <a href="index.php?page=progress&id=<?php echo $skill['id']; ?>">
                                        <div class="progress-circle progress<?php echo $current_skill['id']; ?>">
                                            <!-- <p class="progress_text">hi</p> -->
                                            <p class="progress_text"><?php echo $current_skill['current_skill']; ?></p>
                                            <!-- <p class="progress_percent">Day <span class="colorful-text"></?php  echo date("j.n") - $skill['start_date']  ?></span></p> -->
                                            <p class="progress_percent">Day <span class="colorful-text"><?php $now = time(); // or your date as well
                                                                                                        $start_date = strtotime($current_skill['start_date']);
                                                                                                        $datediff = $now - $start_date;
                                                                                                        echo round($datediff / (60 * 60 * 24)); ?></span>
                                            </p>
                                        </div>

                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>

                    <!-- <div class="following"></div>
                    <div class="public_repos"></div> -->
                </div>

            </div>
        </div>
    </section>
    <!-- <section class="design-elements">
        <h2 class="hidden">Design elementen</h2>
        <img class="home-illustration" src="./assets/img/home.png">
       
    </section> -->
    <section class="skills-to-learn">

        <h2 class="skills-to-learn__title">
            Skills to learn
        </h2>



        <h3 class="h3 extra-margin">Mentaal</h3>
        <div class="scrollmenu">
            <?php foreach ($skills as $skill) : ?>
                <?php if ($skill['categorie'] === 'mental') : ?>
                    <a href="index.php?page=firstbreakdown&id=<?php echo $skill['id']; ?>">
                        <div class="skillcard">
                            <p class="skillcard-text">
                                <?php echo $skill['title'] ?>
                            </p>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
            <!-- <div class="skillcard">
                <p class="skillcard-text">
                    Wheelie
                </p>
            </div>
            <div class="skillcard">
                <p class="skillcard-text">
                    Wheelie
                </p>
            </div> -->
        </div>
        <h3 class="h3 extra-margin">Fysiek</h3>
        <div class="scrollmenu">
            <?php foreach ($skills as $skill) : ?>
                <?php if ($skill['categorie'] === 'physical') : ?>
                    <a href="index.php?page=firstbreakdown&id=<?php echo $skill['id']; ?>">
                        <div class="skillcard">
                            <p class="skillcard-text">
                                <?php echo $skill['title'] ?>
                            </p>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
            <!-- <div class="skillcard">
                <p class="skillcard-text">
                    Rubik's cube
                </p>
            </div>
            <div class="skillcard">
                <p class="skillcard-text">
                    Wheelie
                </p>
            </div>
            <div class="skillcard">
                <p class="skillcard-text">
                    Wheelie
                </p>
            </div> -->
        </div>
    </section>
</main>