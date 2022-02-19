<?php require ROOT . "/templates/layouts/header.html"; ?>
<link rel="stylesheet" href="templates/css/admin.css">

<title>Admin Panel</title>
    <div id="app">
        <h1>Admin Panel</h1>
        <div class="add">
            <h2>add schedule</h2>
            <form action="add_shedule" method="post">
                <input name="date" v-model="date" type="date">
                <select name="event" v-model="event" v-if="date" name="" id="">
                    <option :value="event.id" v-for="event in events">{{ event.name }}</option>
                </select>
                <input name="responsible" type="text" v-if="event" required>
                <button v-if="event"> add </button>
            </form>
        </div>

<?php if(isset($array) && count($array)): ?>

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

        <?php  endif ?>

        <?php foreach($schedules as $schedule): ?>

            <a href="<?php echo 'admin/' . $schedule; ?>"><?php echo $schedule; ?></a>

        <?php endforeach ?>

    </div>
    <script src="templates/js/admin/index.js"></script>
</body>
</html>