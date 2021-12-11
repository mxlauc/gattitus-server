import app from './components/HelloClient.vue';
import { createSSRApp } from 'vue'
let a = createSSRApp(app)
a.mount('#app')

