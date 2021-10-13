import Vue from 'vue'
import App from './App.vue'
import router from './router'
import 'jquery'
import 'popper.js'
import 'bootstrap/js/dist/collapse.js'
import 'bootstrap/js/dist/tab'

// CSS
import 'bootstrap/dist/css/bootstrap.css'
import '../src/assets/css/style.css'


Vue.config.productionTip = false

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')
