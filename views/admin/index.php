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

            {{ array }}

        <h1>Неделя от <?php echo $thisWeek[0] ?></h1>

        <div v-if="currentWeek">
            <div v-for="items in currentWeek">
                {{ items.date }}
                <div v-for="item in items" v-if="typeof(item) != 'string'" >
                    <select name="event" id="">
                        <option :value="item.event.id" name="event">{{ item.event.name }} {{ item.event.time }}</option>
                        <option v-for="event in events" :value="event.id" name="event">{{ event.name }} {{ event.time }}</option>
                    </select>
                    {{ item.event.time }}
                    <input type="text" :value="item.responsible" name="responsible" >
                    <br>
                </div>
                <hr>
            </div>
        </div>
            <button @click="updateShedule()" >Save</button>
        <?php  endif ?>

        <?php foreach($schedules as $schedule): ?>

            <a href="<?php echo 'admin/' . $schedule; ?>"><?php echo $schedule; ?></a>

        <?php endforeach ?>
    </div>
    <!-- <script src="templates/js/admin/index.js"></script> -->
    <script src="templates/js/index.js"></script>
</body>
</html>