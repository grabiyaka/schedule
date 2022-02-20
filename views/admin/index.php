<?php require ROOT . "/templates/layouts/header.php"; ?>
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

<div>

</div>

        <?php  endif ?>

        <?php foreach($schedules as $schedule): ?>

            <a href="<?php echo 'admin/' . $schedule; ?>"><?php echo $schedule; ?></a>

        <?php endforeach ?>
    </div>
    <!-- <script src="templates/js/admin/index.js"></script> -->
    <script src="templates/js/index.js"></script>
</body>
</html>