require('./bootstrap');

import 'bootstrap-css-only/css/bootstrap.min.css';
import 'mdbvue/lib/css/mdb.min.css';
import '../css/lightseed.css'
import '../css/main.css'
import '../css/fonts.css'

window.Vue = require('vue');

// Waves
import Waves from 'vue-waves-effect';
import 'vue-waves-effect/dist/vueWavesEffect.css';
Vue.use(Waves);

// Vue, mainapp + router
import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store';

// Mixins
import assetMixin from './mixins/assetMixin'
Vue.mixin(assetMixin);

// Page title
import VuePageTitle from 'vue-page-title'
Vue.use(VuePageTitle)

/**
 * Components
 */
Vue.component('loading-overlay', require('./components/loading/overlay.vue').default);
Vue.component('loading-dots', require('./components/loading/dots.vue').default);

/**
 * Progressbar
 */
import VueProgressBar from 'vue-progressbar'

const options = {
  color: '#ccedd7',
  failedColor: '#1d252d',
  thickness: '3px',
  transition: {
    speed: '1s',
    opacity: '1',
    termination: 300
  },
  autoRevert: true,
  location: 'top',
  inverse: false
}

Vue.use(VueProgressBar, options)

/**
 * Application
 */
new Vue({
  el: '#app',
  components: { App },
  router,
  store
}).$mount('#app')
