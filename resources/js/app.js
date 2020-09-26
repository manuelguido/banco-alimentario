require('./bootstrap');

import 'bootstrap-css-only/css/bootstrap.min.css';
import 'mdbvue/lib/css/mdb.min.css';
import '../css/lightseed.css'

window.Vue = require('vue');

// Vue, mainapp + router
import Vue from 'vue'
import router from './router'
import store from './store'
import App from './views/App'
import Waves from 'vue-waves-effect';
import 'vue-waves-effect/dist/vueWavesEffect.css';

Vue.use(Waves);

/*--------------------------------------------------------------
    Components
--------------------------------------------------------------*/
// Navigation
Vue.component('navbar', require('./components/navigation/Navbar.vue').default);

// Titles
Vue.component('h-title', require('./components/title/HTitle.vue').default);

// Forms
Vue.component('form-label', require('./components/forms/Label.vue').default);


const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store
});