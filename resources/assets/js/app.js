
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 /*Konfigurasi untuk vue-routes*/
// import router from './routes.js';

import VueRouter from 'vue-router'

Vue.use(VueRouter)
 /*Konfigurasi untuk vue-routes*/

// konfigurasi axios default url
import axios from 'axios'

axios.defaults.baseURL = 'http://sisdi.local/api';
// konfigurasi axios default url

// import vue-tables-2
const TableSchema = {
	skin: 'table table-responsive table-striped table-bordered table-hover table-sm',
	perPageValues: [10, 25, 50, 100, 250, 500, 1000],
	pagination: {
		edge: true
	},
	text: {
		firts: '<<',
		last: '>>'
	}
};

import {ServerTable, ClientTable, Event} from 'vue-tables-2'

Vue.use(ServerTable, TableSchema, false, 'bootstrap4')
Vue.use(ClientTable, TableSchema, false, 'bootstrap4')
// import vue-tables-2

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('beranda-component', require('./components/BerandaComponent.vue'));

Vue.component('projek-component', require('./components/ProjekComponent.vue'));

Vue.component('gpon-component', require('./components/GponComponent.vue'));
Vue.component('odf-component', require('./components/OdfComponent.vue'));
Vue.component('odc-component', require('./components/OdcComponent.vue'));
Vue.component('odp-component', require('./components/OdpComponent.vue'));

const app = new Vue({
    el: '#app'
});
