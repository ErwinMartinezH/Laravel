<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tasks
                        <router-link :to="{ name: 'tasks.create' }" class="btn btn-primary btn-sm float-end">Create Task</router-link>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="task in tasks" :key="task.id">
                                    <td>{{ task.id }}</td>
                                    <td>{{ task.name }}</td>
                                    <td>{{ task.description }}</td>
                                    <td>
                                        <router-link :to="{ name: 'tasks.show', params: { id: task.id } }" class="btn btn-info btn-sm">View</router-link>
                                        <router-link :to="{ name: 'tasks.edit', params: { id: task.id } }" class="btn btn-warning btn-sm">Edit</router-link>
                                        <button @click="deleteTask(task.id)" class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            tasks: []
        };
    },
    created() {
        this.fetchTasks();
    },
    methods: {
        fetchTasks() {
            axios.get('/api/tasks')
                .then(response => {
                    this.tasks = response.data;
                })
                .catch(error => {
                    console.error('Error fetching tasks:', error);
                });
        },
        deleteTask(id) {
            if (confirm('Are you sure you want to delete this task?')) {
                axios.delete(`/api/tasks/${id}`)
                    .then(() => {
                        this.tasks = this.tasks.filter(task => task.id !== id);
                    })
                    .catch(error => {
                        console.error('Error deleting task:', error);
                    });
            }
        }
    }
};
</script>