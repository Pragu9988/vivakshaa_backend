import Vue from "vue";

require('./bootstrap');

window.Vue = require('vue');
window.bus = new Vue();


Vue.component('show-question', require('./components/ShowQuestion.vue').default);

const app = new Vue({
    el: '#app'
});