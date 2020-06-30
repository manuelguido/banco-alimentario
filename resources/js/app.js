require('./bootstrap');

//import '@fortawesome/fontawesome-free/css/all.min.css'
// import 'bootstrap-css-only/css/bootstrap.min.css';
// import 'mdbvue/lib/css/mdb.min.css';

window.Vue = require('vue');

import Vue from 'vue'
import App from './views/App'
import router from './router'

import Vuetify from 'vuetify'
Vue.use(Vuetify);
import 'vuetify/dist/vuetify.min.css'

// const app = new Vue({
//     el: '#app',
//     router,
//     vuetify: new Vuetify(),
// });

new Vue({
    el: '#app',
    components: { App },
    router,
    vuetify: new Vuetify(),
}).$mount('#app')


// const app = new Vue({
//     el: '#app',
//     router,
//     components: { App },
//     // template: '<App/>',
//     vuetify: new Vuetify(),
//   })
  