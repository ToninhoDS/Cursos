import Vue from 'vue'
import MeuVue from './Meu-Vue.vue'

Vue.config.productionTip = false

new Vue({
  render: h => h(MeuVue),
}).$mount('#app')
