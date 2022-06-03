import VueRouter from "vue-router";
import {routes} from './routes';
import store from './store';
import vuetify from './plugins/vuetify';
window.Vue = require('vue').default;

Vue.component('header-component', require('./layout/components/Header/HeaderComponent.vue').default);


// Vue Router Configuration
Vue.use(VueRouter);
const router = new VueRouter({
    mode: 'history',
    routes
});

const app = new Vue({
    vuetify,
    el: '#app',
    store,
    router
});
