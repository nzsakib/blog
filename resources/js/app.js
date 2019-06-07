require('./bootstrap');

window.Vue = require('vue');

window.event = new Vue();

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('editor', require('./components/Editor.vue').default);

const app = new Vue({
    el: '#app',
});
