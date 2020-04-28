require('./bootstrap');

import 'bootstrap-css-only/css/bootstrap.min.css'
import 'mdbvue/lib/css/mdb.min.css'

window.Vue = require('vue');

//Forms
Vue.component('form-label', require('./components/forms/Label.vue').default);

//Auth forms
Vue.component('auth-left-panel', require('./components/auth/LeftPanel.vue').default);
Vue.component('auth-top-panel', require('./components/auth/TopPanel.vue').default);
Vue.component('auth-submit-button', require('./components/auth/SubmitButton.vue').default);
Vue.component('back-home-button', require('./components/auth/BackHomeButton.vue').default);


const app = new Vue({
    el: '#app',
});
