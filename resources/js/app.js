import './bootstrap';
import { BootstrapVue, IconsPlugin } from "bootstrap-vue";
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';


import Vue, { createApp } from 'vue';
// import Vue from 'vue/dist/vue.esm-bundler.js';
import App from './App.vue';
import router from './router';


Vue.use(BootstrapVue);
Vue.use(IconsPlugin);
Vue.component('font-awesome-icon', FontAwesomeIcon);


const app = createApp(App)
  .use(router)
  .mount('#app');

app.globalProps = []
