require('./bootstrap');

import Vue from 'vue';
import SurveyShow from './components/SurveyShow';
import Notifications from 'vue-notification';
import VeeValidate from 'vee-validate';

Vue.use(VeeValidate, {strict: true});
Vue.component('survey-show', SurveyShow);
Vue.use(Notifications);
new Vue({
    el: "#app"
})
