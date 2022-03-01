let app = new Vue({
    el: "#app",
    data: {
        events: [],
        schedule: [],
        currentWeek: [],

        days: [],

        date: false,
        event: false

    },

    computed: {

    },

    methods: {
        getEvents() {
            post("get_events", null, msg => {
                //console.log(msg)
                this.events = JSON.parse(msg)
            })
        },
        getSchedule() {
            post("get_schedule", null, msg => {
                this.schedule = JSON.parse(msg)
            })
        },
        getCurrentWeek() {
            post("get_current_week", null, msg => {
                this.currentWeek = JSON.parse(msg)
            })
        },
        updateShedule($event, id) {
            let fd = new FormData()
            fd.append("id", id)
            fd.append("value", $event.target.value)
            fd.append("name", $event.target.name)

            post("update_schedule", fd, msg => {

            })
        },
        deleteSchedule(id) {
            if (confirm("Вы дествительно хотите удалить запись?")) {
                let fd = new FormData()
                fd.append("id", id)

                post("delete_schedule", fd, msg => {
                    this.getCurrentWeek()
                })
            }

        },
        getDays(){
            post("getDays", null, msg => {
                this.days = JSON.parse(msg)
            })
        }

    },

    beforeMount() {
        this.getSchedule()
        this.getEvents()
        this.getCurrentWeek()
        this.getDays()
    }
})