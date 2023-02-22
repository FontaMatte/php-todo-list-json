const { createApp } = Vue;

createApp({
    data() {
        return {
            apiUrl: './api.php',
            toDoList: []
        }
    },
    methods: {

        taskDone(index) {
            this.toDoList[index].done = !this.toDoList[index].done;
        }

    },
    created() {
        axios
            .get(this.apiUrl)
            .then((response) => {
                this.toDoList = response.data.toDoList
            });
    }
}).mount('#app');