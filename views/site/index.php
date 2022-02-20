<?php

use Illuminate\Console\Scheduling\Schedule;

 require ROOT . "/templates/layouts/header.php"; ?>

<title>Schedule</title>
<link rel="stylesheet" href="templates/css/site.css">

<div id="app">
    <?php foreach($schedules as $schedule): ?>

    <a href="<?php echo $schedule; ?>"><?php echo $schedule; ?></a>

    <?php endforeach ?>
    <br> <br>
    <?php if(count($array)): ?>

    <h1>Неделя от <?php echo $thisWeek[0] ?></h1>

    <?php foreach($array as $items): ?>
    
        <h2><?php echo $days[date('w', strtotime($items['date']))][$lang]; ?></h2>
        <?php foreach($items as $item): ?>
        <div class="event">
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
</div>


<script src="templates/js/index.js"></script>
</body>
</html>