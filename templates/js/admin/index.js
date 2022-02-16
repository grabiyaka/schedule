let app = new Vue({
    el: "#app",
    data: {
        date: false,
        events: [],
        event: false
    },

    computed: {

    },

    methods: {
        getEvents(){
            post("get_events", null, msg => {
                //console.log(msg)
                this.events = JSON.parse(msg)
            })
        }
    },

    beforeMount() {
        this.getEvents()
    }
})