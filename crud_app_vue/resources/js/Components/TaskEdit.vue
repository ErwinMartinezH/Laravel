<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Task</div>
                    <div class="card-body">
                        <form @submit.prevent="updateTask">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" v-model="task.name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" v-model="task.description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <router-link :to="{ name: 'tasks.index' }" class="btn btn-secondary">Cancel</router-link>
                        </form>
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
            task: {
                name: '',
                description: ''
            }
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
        },
        updateTask() {
            axios.put(`/api/tasks/${this.$route.params.id}`, this.task)
                .then(() => {
                    this.$router.push({ name: 'tasks.index' });
                })
                .catch(error => {
                    console.error('Error updating task:', error);
                });
        }
    }
};
</script>