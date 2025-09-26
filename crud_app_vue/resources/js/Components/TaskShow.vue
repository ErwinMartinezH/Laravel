<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Task Details</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ task.name }}</p>
                        <p><strong>Description:</strong> {{ task.description }}</p>
                        <router-link :to="{ name: 'tasks.index' }" class="btn btn-secondary">Back to List</router-link>
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
            task: {}
        };
    },
    created() {
        this.fetchTask();
    },
    methods: {
        fetchTask() {
            axios.get(`/api/tasks/${this.$route.params.id}`)
                .then(response => {
                    this.task = response.data;
                })
                .catch(error => {
                    console.error('Error fetching task:', error);
                });
        }
    }
};
</script>