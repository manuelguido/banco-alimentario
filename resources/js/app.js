require('./bootstrap');

import 'bootstrap-css-only/css/bootstrap.min.css'
import 'mdbvue/lib/css/mdb.min.css'

window.Vue = require('vue');

//Forms
Vue.component('form-label', require('./components/forms/Label.vue').default);

//Buttons
Vue.component('seed-button', require('./components/buttons/SeedButton.vue').default);
Vue.component('seed-outline-button', require('./components/buttons/SeedOutlineButton.vue').default);
Vue.component('seed-button-rounded', require('./components/buttons/SeedButtonRounded.vue').default);
Vue.component('seed-outline-button-rounded', require('./components/buttons/SeedOutlineButtonRounded.vue').default);
Vue.component('next-button', require('./components/buttons/NextButton.vue').default);

//Titles
Vue.component('title-min', require('./components/titles/TitleMin.vue').default);

//Auth forms
Vue.component('auth-left-panel', require('./components/auth/LeftPanel.vue').default);
Vue.component('auth-top-panel', require('./components/auth/TopPanel.vue').default);
Vue.component('auth-submit-button', require('./components/auth/SubmitButton.vue').default);
Vue.component('back-home-button', require('./components/auth/BackHomeButton.vue').default);
    //Giver
Vue.component('giver-stepper', require('./components/auth/GiverStepper/GiverStepper.vue').default);


const app = new Vue({
    el: '#app',
});
