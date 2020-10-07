require('./bootstrap');

import 'bootstrap-css-only/css/bootstrap.min.css';
import 'mdbvue/lib/css/mdb.min.css';
import '../css/lightseed.css'
import '../css/main.css'
import '../css/fonts.css'
// Waves
import Waves from 'vue-waves-effect';
import 'vue-waves-effect/dist/vueWavesEffect.css';

window.Vue = require('vue');

// Vue, mainapp + router
import Vue from 'vue';
import App from './views/App';
import router from './router';
import store from './store';

// Mixins
import assetMixin from './mixins/assetMixin'
Vue.mixin(assetMixin)

Vue.use(Waves);

/**
 *  Components 
 *
 */
// Navigation
Vue.component('navbar', require('./components/navigation/Navbar.vue').default);
// Titles
Vue.component('h-title', require('./components/title/HTitle.vue').default);
// Forms
Vue.component('form-label', require('./components/forms/Label.vue').default);

/**
 * Home components
 */
// Content
Vue.component('home-content', require('./components/pages/home/Content.vue').default);

/**
 * Auth components
 */
// Navigation
Vue.component('login-card', require('./components/auth/LoginCard.vue').default);
// Submit button
Vue.component('submit-button', require('./components/buttons/Submit.vue').default);
// Submit button
Vue.component('account-button', require('./components/navigation/AccountButton.vue').default);

/**
 * Dashboard components
 */
// Navigation
Vue.component('dashboard-navigation', require('./components/dashboard/navigation/Navigation.vue').default);
// Navigation
Vue.component('dashboard', require('./views/layouts/Dashboard.vue').default);

/**
 * Application
 */
new Vue({
    el: '#app',
    components: { App },
    router,
    store
  }).$mount('#app')
