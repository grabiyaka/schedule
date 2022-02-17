<?php

use Illuminate\Console\Scheduling\Schedule;

 require ROOT . "/templates/layouts/header.html"; ?>

<title>Schedule</title>

<?php foreach($schedules as $schedule): ?>

    <a href="<?php echo $schedule["date"]; ?>"><?php echo $schedule["date"]; ?></a>

<?php endforeach ?>
<br> <br>
<?php if(count($array)): ?>

    <h1>Неделя от <?php echo $thisWeek[0] ?></h1>

    <?php foreach($array as $items): ?>

        <h2><?php echo $days[$items[0]['event']['day']][$lang] ?></h2>
        <?php foreach($items as $item): ?>
        <div class="">
            <?php if(gettype($item) == 'array'): ?> 
            <h3>Пункт: <?php echo $item['event']['name']; ?></h3>
            <h3>Отвецтвенный: <?php echo $item['responsible']; ?></h3>
            <h3>Время: <?php echo $item['event']['time']; ?></h3>
            <br>
            <?php endif ?>
        </div>
        <?php endforeach ?>
        <hr>
    <?php endforeach ?>

<?php else: ?>
PAGE NOT FOUND
<?php  endif ?>

</body>
</html>