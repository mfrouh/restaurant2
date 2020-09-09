require('./bootstrap');
window.Vue = require('vue');
// for auto scroll
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

Vue.component('product',require('./components/product.vue').default);
Vue.component('cart',require('./components/cart.vue').default);
Vue.component('restaurant',require('./components/restaurant.vue').default);
Vue.component('restaurants',require('./components/restaurants.vue').default);

var app = new Vue({
    el: '#app',
    data: {

    }
  })

