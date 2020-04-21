

require('./bootstrap');

window.Vue = require('vue');
import BootstrapVue from 'bootstrap-vue'
window.Vue.use(BootstrapVue) 

Vue.component('repo-container', require('./components/RepoContainer.vue').default);


const app = new Vue({
    el: '#app',
});
