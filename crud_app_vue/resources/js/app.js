import '../css/app.css';
import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';

import TasksList from './Components/TasksList.vue';
import TaskCreate from './Components/TaskCreate.vue';
import TaskEdit from './Components/TaskEdit.vue';
import TaskShow from './Components/TaskShow.vue';

const routes = [
    { path: '/', component: TasksList, name: 'tasks.index' },
    { path: '/tasks/create', component: TaskCreate, name: 'tasks.create' },
    { path: '/tasks/:id/edit', component: TaskEdit, name: 'tasks.edit' },
    { path: '/tasks/:id', component: TaskShow, name: 'tasks.show' },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

const app = createApp({});
app.use(router);
app.mount('#app');
