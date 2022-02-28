<?php

use Illuminate\Console\Scheduling\Schedule;

 require ROOT . "/templates/layouts/header.php"; ?>

 <script> 
 function include(url) {
  var script = document.createElement('script');
  script.src = url;
  document.getElementsByTagName('head')[0].appendChild(script);
}
 include("http://localhost/schedule/templates/layouts/header.php") </script>

<title>Schedule</title>
<link rel="stylesheet" href="templates/css/site.css">

<div id="app">
    {{ currentWeek }}
    <?php foreach($schedules as $schedule): ?>

    <a href="<?php echo $schedule; ?>"><?php echo $schedule; ?></a>

    <?php endforeach ?>
    <br> <br>
    <?php if(count($array)): ?>

    <h1>Неделя от <?php echo $thisWeek[0] ?></h1>

    <div v-if="currentWeek">
            <div v-for="items in currentWeek">
                {{ items.date }}
                <div v-for="item in items" v-if="typeof(item) != 'string'" >
                    <h3> Пункт и время: {{ item.event.name }} {{ item.event.time }}</h3>
                    <h3>Отвецтвенный: {{ item.responsible }}</h3>
                    <br>
                </div>
                <hr>
            </div>
        </div>
        

   
    <?php else: ?>
    PAGE NOT FOUND
    <?php  endif ?>
</div>


<script src="templates/js/index.js"></script>
</body>
</html>