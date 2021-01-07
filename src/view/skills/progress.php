<?php $checkStep = array(); ?>
<?php $stepDayArray = array(); ?>
<?php $calcModArray = array(); ?>
<?php $checkCalcModArray = array(); ?>
<?php $weekDays = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"); ?>
<?php $checkCurrentDay = array(); ?>
<?php $storeStepsCurrentDay = array(); ?>

<?php $now = time(); // or your date as well
$start_date = strtotime($currentSkill['start_date']);
$datediff = $now - $start_date; ?>

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

<main class="main">
    <div class="page-head">
        <a href="index.php?page=home">
            <div class="back-button"><i class="fas fa-arrow-left"></i></div>
        </a>
        <div class="flex__h1-tips">
            <h1 class="h1"><?php echo $currentSkill['current_skill']; ?></h1>
            <a href="index.php?page=settings&id=<?php echo $skill['id']; ?>">
                <p class="tips">Settings</p>
            </a>
        </div>
    </div>

    <div class="choose-week">
        <h2 class="h2">Week</h2>
        <form method="post" action="index.php?page=progress&id=<?php echo $skill['id']; ?>" class="filter-form week-form">
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

            <input type="submit" value="sorteer" class="sort-week-button hidden">
        </form>
    </div>
    <?php for ($x = 0; $x < count($weekArray); $x++) : ?>
        <div class="overview-weekplan<?php if ($x + 1 !== (int)$getWeek) {
                                            echo " hidden";
                                        } ?>">
            <?php foreach ($weekDays as $newday) : ?>
                <?php array_push($checkCurrentDay, 'x'); ?>
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

                            <?php if (round($datediff / (60 * 60 * 24)) == count($checkCurrentDay)) : ?>
                                <?php array_push($storeStepsCurrentDay, $stepDayArray[count($checkStep) - 1]); ?>
                            <?php endif; ?>

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

                                <?php if (round($datediff / (60 * 60 * 24)) == count($checkCurrentDay)) : ?>
                                    <?php array_push($storeStepsCurrentDay, $stepDayArray[count($checkStep) - 1]); ?>
                                <?php endif; ?>

                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- <p class="planner-text">Memorize & practise standard algorithms</p> -->
                </div>

            <?php endforeach; ?>
        </div>
    <?php endfor; ?>
    <div class="style__margin-top">
        <h2 class="h2">Today - day <?php echo round($datediff / (60 * 60 * 24)); ?></h2>
    </div>
    <div class="progress-image">
        <?php foreach ($storeStepsCurrentDay as $step) : ?>
            <?php foreach ($stepsday as $stepday) : ?>
                <?php if ($stepday['title'] === $step) : ?>
                    <p class="t-title"><?php echo $step; ?></p>
                    <p class="t-description"><?php echo $stepday['description']; ?></p>
                <?php endif; ?>
                <p class="hidden"><?php echo $stepday['title']; ?></p>
            <?php endforeach; ?>
        <?php endforeach; ?>

    </div>
    <p class="common-text">If you finished today's training, click this button so we know.</p>
    <div class="start-button">
        <p class="button__text">Done for today</p>
    </div>
</main>