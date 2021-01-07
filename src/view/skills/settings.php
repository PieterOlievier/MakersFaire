<main class="main">
    <div class="page-head">
        <a href="index.php?page=progress&id=<?php echo $skill['id']; ?>">
            <div class="back-button"><i class="fas fa-arrow-left"></i></div>
        </a>
        <h1 class="h1">Settings</h1>

    </div>

    <p class="common-text">Notifications (adjust if needed)</p>

    <section class="settings-section">


        <form method="post" action="index.php?page=settings&id=<?php echo $skill['id']; ?>">
            <input type="hidden" name="skill_id" value="<?php echo $skill['id'] ?>">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']['id'] ?>">
            <input type="hidden" name="action" value="updateHours" />

            <?php foreach ($hours as $hour) : ?>

                <div class="notification-hours">
                    <input class="time-picker time__tester" name="time_one" required type="time" value="<?php echo $hour['time_one'] ?>">

                    <?php if ($currentSkill['recommanded_time'] > $currentSkill['timeperiod']) : ?>
                        <input class="time-picker" name="time_two" required type="time" value="<?php echo $hour['time_two'] ?>">
                    <?php else : ?>
                        <input class=" hidden" name="time_two" type="time" value="<?php echo $hour['time_two'] ?>">
                    <?php endif; ?>

                    <?php if ($currentSkill['recommanded_time'] / 2 > $currentSkill['timeperiod']) : ?>
                        <input class="time-picker" name="time_three" required type="time" value="<?php echo $hour['time_three'] ?>">
                    <?php else : ?>
                        <input class=" hidden" name="time_three" type="time" value="<?php echo $hour['time_three'] ?>">
                    <?php endif; ?>

                    <?php if ($currentSkill['recommanded_time'] / 3 > $currentSkill['timeperiod']) : ?>
                        <input class="time-picker" name="time_four" required type="time" value="<?php echo $hour['time_four'] ?>">
                    <?php else : ?>
                        <input class=" hidden" name="time_four" type="time" value="<?php echo $hour['time_four'] ?>">
                    <?php endif; ?>

                </div>
            <?php endforeach; ?>

            <input class="update-notifications__button" type="submit" value="update notifications">

        </form>

        <div class="divider-line"> </div>

        <p class="common-text">Time period to learn this skill</p>

        <div class="settings-timeperiod">
            <div class="sub-text timeperiod-days">
                <?php echo $currentSkill['timeperiod']; ?> days
            </div>
            <div class="sub-text timeperiod-current">currently at day
                <p class="timeperiod-current__day"><?php $now = time(); // or your date as well
                                                    $start_date = strtotime($currentSkill['start_date']);
                                                    $datediff = $now - $start_date;
                                                    echo round($datediff / (60 * 60 * 24)); ?></p>
            </div>
        </div>

        <form method="post" action="index.php?page=settings&id=<?php echo $skill['id']; ?>">
            <input type="hidden" name="skill_id" value="<?php echo $skill['id'] ?>">
            <input type="hidden" name="action" value="removeSkill" />
            <input type="hidden" name="status">
            <input class="remove-skill" type="submit" value="Remove skill">
        </form>

    </section>
</main>