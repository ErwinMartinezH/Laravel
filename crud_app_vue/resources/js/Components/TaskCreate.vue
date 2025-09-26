<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New Task</div>
                    <div class="card-body">
                        <form @submit.prevent="createTask">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" v-model="task.name" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" v-model="task.description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
    methods: {
        createTask() {
            axios.post('/api/tasks', this.task)
                .then(() => {
                    this.$router.push({ name: 'tasks.index' });
                })
                .catch(error => {
                    console.error('Error creating task:', error);
                });
        }
    }
};
</script>