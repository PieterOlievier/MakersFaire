<main class="main">
    <div class="page-head">
        <a href="index.php?page=home">
            <div class="back-button"><i class="fas fa-arrow-left"></i></div>
        </a>
        <div>
            <h1 class="h1"><?php echo $skill['title']; ?></h1>
            <p class="blue-text">learing steps:</p>
        </div>
    </div>
    <section class="skill-breakdown">





        <?php foreach ($stepsweek as $stepweek) : ?>
            <div class="skill-breakdown__card">
                <p class="skill-breakdown__card-text">
                    <?php echo $stepweek['description']; ?>
                </p>
                <p class="skill-breakdown__card-number<?php echo $stepweek['step']; ?>">
                    <?php echo $stepweek['step']; ?>
                </p>
            </div>
        <?php endforeach; ?>
    </section>
    <section class="start-learning">
        <div class="divider-line">
        </div>
        <h2 class="h2">
            Average time to learn:</br>
            4 weeks
        </h2>

        <form method="post" action="index.php?page=firstbreakdown&id=<?php echo $skill['id']; ?>" class="comment-form secondbreakdown-form">

            <input type="hidden" name="action" value="addnewskill">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>">
            <input type="hidden" name="current_skill" value="<?php echo $skill['title'] ?>">
            <input type="hidden" name="recommanded_time" value="<?php echo $skill['recommanded_time'] ?>">
            <input type="hidden" name="timeperiod" value="<?php echo $skill['recommanded_time'] ?>">
            <input type="hidden" name="start_date" value="<?php echo date("y-m-d") ?>">
            <input type="hidden" name="status" value="progress">
            <!-- <input type="hidden" name="user_name" value=""> -->



            <input class="start-button" type="submit" name="button" value="Next">

        </form>

    </section>
</main>