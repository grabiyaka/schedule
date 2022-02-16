<?php

use Illuminate\Console\Scheduling\Schedule;

 require ROOT . "/templates/layouts/header.html"; ?>

<title>Schedule</title>

<?php foreach($schedules as $schedule): ?>

    <a href="<?php echo $schedule["date"]; ?>"><?php echo $schedule["date"]; ?></a>

<?php endforeach ?>
<br> <br>
<?php if(count($current_schedules)): ?>

<h1><?php echo $current_schedules[0]['date']; ?></h1>

<hr>

<?php foreach($current_schedules as $current_schedule): ?>

    <h2><?php  echo $days[$events[$current_schedule['event_id'] - 1]['day']][$lang]; ?> <br></h2>
    <h3><?php  echo $events[$current_schedule['event_id'] - 1]['time']; ?> <br></h3>

    <div>
        <br>
        <?php echo $current_schedule['responsible']; ?>
        <br>
        <?php  echo $events[$current_schedule['event_id'] - 1]['name']; ?> <br>
        <hr>
    </div>

<?php endforeach ?>
<?php else: ?>
PAGE NOT FOUND
<?php  endif ?>

</body>
</html>