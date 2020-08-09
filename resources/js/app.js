require('./bootstrap');
window.Vue = require('vue');
// for auto scroll
import Vue from 'vue'

Vue.component('product',require('./components/product.vue').default);
Vue.component('cart',require('./components/cart.vue').default);

var app = new Vue({
    el: '#app',
    data: {
      
    }
  })
  
  