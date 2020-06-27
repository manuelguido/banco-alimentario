import Vue from 'vue'
import App from './views/App'
import router from './router'

import Vuetify from 'vuetify'
Vue.use(Vuetify);

// const app = new Vue({
//     el: '#app',
//     router,
//     vuetify: new Vuetify(),
// });

const app = new Vue({
    el: '#app',
    components: { App },
    router,
    vuetify: new Vuetify(),
});


// const app = new Vue({
//     el: '#app',
//     router,
//     components: { App },
//     // template: '<App/>',
//     vuetify: new Vuetify(),
//   })
  