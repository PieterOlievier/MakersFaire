<main class="main">
    <div class="page-head">
        <a href="index.php?page=firstbreakdown&id=<?php echo $skill['id']; ?>">
            <div class="back-button"><i class="fas fa-arrow-left"></i></div>
        </a>
        <h1 class="h1">Timeperiod:</h1>
    </div>

    <p class="sub-text">In how many days do you want
        to learn your skill?</p>


    <div class="recomanded-time">


        <p class="common-text">You will get a notification at these hours.</p>


        <section class="skill-breakdown-new">
            <div class="skill-breakdown__card">
                <p class="skill-breakdown__card-text">
                    Amount of weeks
                </p>
                <p class="recomanded-time__weeks">
                    <?php echo (ceil($skill['recommanded_time'] / 7)); ?>
                </p>
                <p>(<?php echo $skill['recommanded_time']; ?> days)</p>
            </div>
            <a class="recommanded-time__button" href="index.php?page=thirdbreakdown&id=<?php echo $skill['id']; ?>">
                <div class="continue-button__blue">
                    <p class="continue-button-text__white">Continue with recommanded time</p>
                </div>
            </a>
        </section>

        <div class="divider-line"> </div>

        <section class="choose-own-time">
            <div>
                <p class="sub-text">Or…</p>
                <p class="common-text">Choose your own goal (in days):</p>
            </div>

            <form method="post" action="index.php?page=secondbreakdown&id=<?php echo $skill['id']; ?>" class="comment-form secondbreakdown-form">

                <input type="hidden" name="action" value="updateTimeperiod" />
                <input type="hidden" name="id" value="<?php echo $currentSkill['id'] ?>">
                <input type="hidden" name="title" value="<?php echo $currentSkill['current_skill'] ?>">
                <input type="hidden" name="recommanded_time" value="<?php echo $currentSkill['recommanded_time'] ?>">
                <input type="hidden" name="start_date" value="<?php echo $currentSkill['start_date'] ?>">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>">


                <div>
                    <h3 class="why-this-challenge_h3 white-title">Comments</h3>
                    <ul class="comment__list">
                        <li class="comment-style"><?php echo $currentSkill['timeperiod'] ?></li>
                    </ul>
                </div>
                <div>
                    <article class="detail">
                        <h3 class="hidden">Place comment</h3>

                        <div class="day-selector">
                            <input type="number" name="timeperiod" class="day-selector-input" required value="<?php echo $currentSkill['timeperiod'] ?>">
                            <p class="day-selector-text">days</p>
                        </div>
                        <div>
                            <input class="comments-form__button" type="submit" name="button" value="Continue with your time">

                            <!-- <div class="continue-button__white">
                                <p class="continue-button-text__blue">Continue with your time</p>
                                <i class="fas fa-arrow-right"></i>
                            </div> -->
                        </div>

                    </article>
                </div>
            </form>

            <!-- <div class="day-selector">
                <input type="number" class="day-selector-input">
                <p class="day-selector-text">days</p>
            </div> -->

            <!-- <a href="index.php?page=thirdbreakdown">
                <div class="continue-button__white">
                    <p class="continue-button-text__blue">Continue with your time</p>
                    <i class="fas fa-arrow-right"></i>
                </div>
            </a> -->
        </section>

        <!-- <section class="design-elements">
            <h2 class="hidden">Design elementen</h2>
            <img class="home-illustration" src="./assets/img/home.png">
        </section> -->
</main>