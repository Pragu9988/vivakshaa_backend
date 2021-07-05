
require('./bootstrap');

window.Vue = require('vue');

Vue.component('show-question', require('./components/ShowQuestion.vue').default);

const app = new Vue({
    el: '#app'
});