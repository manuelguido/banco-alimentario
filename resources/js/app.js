require('./bootstrap');

//import '@fortawesome/fontawesome-free/css/all.min.css'
import 'bootstrap-css-only/css/bootstrap.min.css';
import 'mdbvue/lib/css/mdb.min.css';

window.Vue = require('vue');

// Vue, mainapp + router
import Vue from 'vue'
import App from './views/App'
import router from './router'

// Components
Vue.component('navbar', require('./components/navigation/Navbar.vue').default);

new Vue({
    el: '#app',
    components: { App },
    router
}).$mount('#app')
