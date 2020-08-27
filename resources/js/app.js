require('./bootstrap');
window.Vue = require('vue');

import ChatApp from './components/ChatApp';


const app = new Vue({
    el: '#app',
    components: {
        ChatApp
    }
});
