require('./bootstrap');
window.Vue = require('vue').default;
import { createApp } from 'vue';

let app=createApp({})
app.component('search-component', require('./components/SearchComponent.vue').default);
app.mount("#app");