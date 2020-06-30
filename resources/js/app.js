require('./bootstrap');

// Vue, mainapp + router
import Vue from 'vue'
import App from './views/App'
import router from './router'

// Vuetift
import Vuetify from 'vuetify'
Vue.use(Vuetify);
import 'vuetify/dist/vuetify.min.css'

new Vue({
    el: '#app',
    components: { App },
    router,
    vuetify: new Vuetify(),
}).$mount('#app')
