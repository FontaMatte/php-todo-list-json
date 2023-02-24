const { createApp } = Vue;

createApp({
    data() {
        return {
            readUrl: './read.php',
            createUrl: './create.php',
            deleteUrl: './delete.php',
            updateUrl: './update.php',
            toDoList: [],
            newTask: '',
        }
    },
    methods: {

        addTask() {
            axios
                .post(this.createUrl,{
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
        },

        deleteTask(index) {
            axios
                .post(this.deleteUrl,{
                    deleteTask: index
                },
                {
                    headers: {
                        'Content-Type' : 'multipart/form-data'
                    }
                }
                )
                .then((response) => {

                    this.toDoList = response.data.toDoList

                });
        },

        taskDone(index) {

            this.toDoList[index].done = !this.toDoList[index].done;

            axios
                .post(this.updateUrl,{
                    updateTask: this.toDoList[index],
                    index: index
                },
                {
                    headers: {
                        'Content-Type' : 'multipart/form-data'
                    }
                })
                .then((response) => {

                    console.log(response);

                });
        },

    },
    created() {
        axios
            .get(this.readUrl)
            .then((response) => {
                this.toDoList = response.data.toDoList
            });
    }
}).mount('#app');