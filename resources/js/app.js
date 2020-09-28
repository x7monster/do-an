require('./bootstrap');

window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue').default);


window.onload = function () {
    const app = new Vue({
        el: '#app',
    });
}
