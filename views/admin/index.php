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

        <?php if(isset($current_schedules)): ?>

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

        <?php endif ?>
        <?php endif ?>

        <?php foreach($linkSchedules as $schedule): ?>

            <a href="<?php echo 'admin/' . $schedule; ?>"><?php echo $schedule; ?></a>

        <?php endforeach ?>

    </div>
    <script src="templates/js/admin/index.js"></script>
</body>
</html>