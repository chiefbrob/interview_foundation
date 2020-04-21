

require('./bootstrap');

window.Vue = require('vue');


Vue.component('repo-container', require('./components/RepoContainer.vue').default);

const app = new Vue({
    el: '#app',
});
