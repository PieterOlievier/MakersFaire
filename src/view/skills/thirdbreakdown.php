<?php $checkStep = array(); ?>
<?php $stepDayArray = array(); ?>
<?php $calcModArray = array(); ?>
<?php $checkCalcModArray = array(); ?>
<?php $weekDays = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"); ?>

<main class="main">
    <div class="page-head">
        <a href="index.php?page=secondbreakdown&id=<?php echo $skill['id']; ?>">
            <div class="back-button"><i class="fas fa-arrow-left"></i></div>
        </a>
        <h1 class="h1">Your plan:</h1>
    </div>
    <div class="extra-margin">
        <p class="h2">This is how your plan will look like then:</p>
    </div>

    <?php foreach ($stepsday as $stepday) : ?>
        <p class="hidden"><?php array_push($stepDayArray, $stepday['title']); ?></p>
    <?php endforeach; ?>
    <?php if ($currentSkill['timeperiod'] !== $currentSkill['recommanded_time']) {
        echo $currentSkill['timeperiod'];
    } else {
        echo $currentSkill['recommanded_time'];
    } ?>
    <?php
    $weekArray = array();
    $amountOfWeeks = ceil($currentSkill['timeperiod'] / 7);
    for ($x = 0; $x < $amountOfWeeks; $x++) {
        array_push($weekArray, $x);
    }
    ?>

    <?php //--------------------------- Modulo code ---------------------------------- 
    ?>

    <p class="hidden">Minstens <?php echo floor($currentSkill['recommanded_time'] / $currentSkill['timeperiod']); ?> keer per dag</p>
    <p class="hidden">Op <?php echo $currentSkill['recommanded_time'] % $currentSkill['timeperiod']; ?> dagen nog 1 keer extra</p>

    <?php
    $modArray = array();
    $newModArray = array();

    $minAmountOfTimes =
        floor($currentSkill['recommanded_time'] / $currentSkill['timeperiod']);
    $extraTimes =
        $currentSkill['recommanded_time'] % $currentSkill['timeperiod'];

    for ($x = 0; $x < $minAmountOfTimes; $x++) {
        array_push($modArray, $x);
    }

    for ($x = 0; $x < $extraTimes; $x++) {
        array_push($calcModArray, $x);
    }

    for ($x = 0; $x < $minAmountOfTimes + 1; $x++) {
        array_push($newModArray, $x);
    }

    ?>


    <div class="choose-week">
        <h2 class="h2">Week</h2>
        <form method="post" action="index.php?page=thirdbreakdown&id=<?php echo $skill['id']; ?>" class="filter-form">
            <?php foreach ($weekArray as $week) : ?>
                <label class="week-number" onclick="clickFunction()">
                    <script>
                        function clickFunction() {
                            setTimeout(function() {
                                const button = document.querySelector(`.sort-week-button`);
                                button.form.submit();
                            }, 10);
                        }
                    </script>
                    <div>
                        <span>
                            <input id="weekcheck" type="radio" name="select_week" class="hidden" value="<?php echo $week + 1; ?>">
                            <span class="opacity-full">
                                <div class="week-num <?php if (($week + 1) === (int)$getWeek) {
                                                            echo " add_week-num";
                                                        } ?>">
                                    <?php echo $week + 1; ?>

                                </div>
                            </span>
                        </span>
                    </div>

                </label>
            <?php endforeach; ?>

            <input type="submit" value="sorteer" class="button_CTA no-margin">
        </form>
    </div>

    <?php for ($x = 0; $x < count($weekArray); $x++) : ?>
        <div class="overview-weekplan<?php if ($x + 1 !== (int)$getWeek) {
                                            echo " hidden";
                                        } ?>">
            <?php foreach ($weekDays as $newday) : ?>
                <div class="overview-day">
                    <div class="align-day">
                        <p class="day"><?php echo $newday; ?></p>
                    </div>
                    <?php if (count($calcModArray) >= count($checkCalcModArray)) {
                        array_push($checkCalcModArray, 'x');
                    } ?>
                    <?php if (count($checkCalcModArray) <= $currentSkill['recommanded_time'] % $currentSkill['timeperiod']) : ?>
                        <?php foreach ($newModArray as $time) : ?>
                            <p class="planner-text"><?php echo $stepDayArray[count($checkStep)]; ?></p>
                            <?php array_push($checkStep, 'x'); ?>
                            <?php // echo count($checkCalcModArray); 
                            ?>

                        <?php endforeach; ?>
                    <?php else : ?>
                        <?php foreach ($modArray as $time) : ?>
                            <?php if (count($stepDayArray) >= count($checkStep) + 1) : ?>
                                <p class="planner-text"><?php echo $stepDayArray[count($checkStep)]; ?></p>
                                <?php array_push($checkStep, 'x'); ?>
                                <?php // echo count($checkCalcModArray); 
                                ?>
                                <?php // echo $stepDayArray[count($checkStep)]; 
                                ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- <p class="planner-text">Memorize & practise standard algorithms</p> -->
                </div>
            <?php endforeach; ?>
        </div>
    <?php endfor; ?>

    <div class="breakdown-line__div">
        <div>
            <p class="sub-text">At what time(s) of the day do you want to practise your skill?</p>
            <p class="common-text">You will get a notification at these hours.</p>
        </div>
        <!-- <div class="hour-box"></div> -->
        <form method="post" action="index.php?page=thirdbreakdown&id=<?php echo $skill['id']; ?>" class="thirdbreakdown-form">
            <input type="hidden" name="skill_id" value="<?php echo $skill['id']; ?>">
            <input type="hidden" name="start_date" value="<?php echo date("y-m-d"); ?>">
            <input type="hidden" name="user_id" value="<?php echo ($_SESSION['user']['id']); ?>">
            <!-- <input type="hidden" name="user_name" value=""> -->

            <!-- Plaats hier een 2de action om de status te veranderen -->
            <input type="hidden" name="action" value="updateHome" />

            <input type="hidden" name="action" value="insertHour" />

            <p><?php echo ($_SESSION['user']['id']); ?></p>
            <div class="notification-hours">
                <input class="time-picker time__tester" name="time_one" required type="time">

                <?php if ($currentSkill['recommanded_time'] > $currentSkill['timeperiod']) : ?>
                    <input class="time-picker" name="time_two" required type="time">
                <?php else : ?>
                    <input class=" hidden" name="time_two" type="time">
                <?php endif; ?>

                <?php if ($currentSkill['recommanded_time'] / 2 > $currentSkill['timeperiod']) : ?>
                    <input class="time-picker" name="time_three" required type="time">
                <?php else : ?>
                    <input class=" hidden" name="time_three" type="time">
                <?php endif; ?>

                <?php if ($currentSkill['recommanded_time'] / 3 > $currentSkill['timeperiod']) : ?>
                    <input class="time-picker" name="time_four" required type="time">
                <?php else : ?>
                    <input class=" hidden" name="time_four" type="time">
                <?php endif; ?>
                <input class=" hidden" name="progress" value="progress">

                <!-- <input class="time-picker" type="time">
                <input class="time-picker" type="time"> -->
            </div>
            <!-- <a href="index.php?page=secondbreakdown"> -->
            <input class="start-button" type="submit" value="Let's get started!">
            <!-- </a> -->
        </form>

    </div>
</main>