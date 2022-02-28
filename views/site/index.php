<?php

use Illuminate\Console\Scheduling\Schedule;

require ROOT . "/templates/layouts/header.php"; ?>



<title>Schedule</title>
<link rel="stylesheet" href="templates/css/site.css">

<div id="app" class="container">

    <nav class="container">
    <?php foreach($schedules as $schedule): ?>

    <a href="<?php echo $schedule; ?>"><?php echo $schedule; ?></a>

    <?php endforeach ?>
    </nav>
    <br> <br>
    
    <div v-if="currentWeek.length">

        <div v-if="currentWeek">
        <h1>Неделя от <?php echo $thisWeek[0] ?></h1>
            <div v-for="items in currentWeek" >
                <h3>{{ items.date }}</h3>
                <div v-for="item in items" v-if="typeof(item) != 'string'" class="" >
                    <h3> Пункт и время: {{ item.event.name }} {{ item.event.time }}</h3>
                    <h3>Отвецтвенный: {{ item.responsible }}</h3>
                    <br>
                </div>
                <hr>
            </div>
        </div>
    </div>   
    <div v-else>
        PAGE NOT FOUND
    </div>
</div>


<script src="templates/js/index.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>