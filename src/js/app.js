window.Vue = require('vue')

Vue.component('products', require('./components/products.vue').default)
Vue.component('product', require('./components/product.vue').default)
Vue.component('sort', require('./components/sort.vue').default)
Vue.component('pagination', require('./components/pagination.vue').default)

const app = new Vue({
    el: "#app",
})