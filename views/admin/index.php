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

        <div v-if="currentWeek" class="container">
            <div v-for="items in currentWeek">
                {{ items.date }}
                <div v-for="item in items" v-if="typeof(item) != 'string'" >
                    <select @change="updateShedule($event, item.id)" name="event_id" id="">
                        <option :value="item.event.id" name="event">{{ item.event.name }} {{ item.event.time }}</option>
                        <option v-for="event in events" :value="event.id" :name="event.id">{{ event.name }} {{ event.time }}</option>
                    </select>
                    <input name="responsible" @keyup.stop="updateShedule($event, item.id)" type="text" :value="item.responsible" >
                    <br>
                    <button class="btn btn-danger" @click="deleteSchedule(item.id)">DELETE</button>
                </div>
                <hr>
            </div>
        </div>
        <?php  endif ?>

        <div class="container">
        <?php foreach($schedules as $schedule): ?>

            <a href="<?php echo 'admin/' . $schedule; ?>"><?php echo $schedule; ?></a>

        <?php endforeach ?>
        </div>
        
    </div>
    <!-- <script src="templates/js/admin/index.js"></script> -->
    <script src="templates/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>