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


/**
 * Application
 */
const app = new Vue({
    el: '#app',
});
