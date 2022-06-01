import VueRouter from "vue-router";
import {routes} from './routes';
import store from './store';
import Vuetify from './plugins/vuetify';
require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('header-component', require('./components/Header/HeaderComponent.vue').default);


// Vue Router Configuration
Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    vuetify: Vuetify,
    el: '#app',
    store,
    router
});
