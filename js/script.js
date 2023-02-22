const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: './api.php',
            toDoList: []
        }
    },
    methods: {

    },
    created() {
        axios
            .get(this.apiUrl)
            .then((response) => {
                this.toDoList = response.data.toDoList
            });
    }
}).mount('#app');