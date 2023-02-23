const { createApp } = Vue;

createApp({
    data() {
        return {
            getUrl: './get.php',
            addUrl: './add.php',
            toDoList: [],
            newTask: '',
        }
    },
    methods: {

        taskDone(index) {
            this.toDoList[index].done = !this.toDoList[index].done;
        },

        addTask() {
            axios
                .post(this.addUrl,{
                    newTask: this.newTask
                },
                {
                    headers: {
                        'Content-Type' : 'multipart/form-data'
                    }
                })
                .then((response) => {
                    this.toDoList = response.data.toDoList
                });

            this.newTask = '';
        }

    },
    created() {
        axios
            .get(this.getUrl)
            .then((response) => {
                this.toDoList = response.data.toDoList
            });
    }
}).mount('#app');