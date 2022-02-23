let app = new Vue({
    el: "#app",
    data: {
        events: [],
        schedule: [],
        currentWeek: [],

        array: [],

        date: false,
        event: false

    },

    computed: {

    },

    methods: {
        ///////GET
        getEvents(){
            post("get_events", null, msg => {
                //console.log(msg)
                this.events = JSON.parse(msg)
            })
        },
        getSchedule(){
            post("get_schedule", null, msg => {
                this.schedule = JSON.parse(msg)
            })
        },
        getCurrentWeek(){
            post("get_current_week", null, msg => {
                this.currentWeek = JSON.parse(msg)
            })
        },

        updateShedule(){
            let fd = new FormData()
            fd.append('event', event)
            fd.append('name', name)
            
            post("update_shedule", fd, msg => {
                this.array = JSON.parse(msg)
            })
        }
    },

    beforeMount() {
        this.getSchedule()
        this.getEvents()
        this.getCurrentWeek()
    }
})