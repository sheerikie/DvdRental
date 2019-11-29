/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';
import Vue from "vue";
import VueSimpleAlert from "vue-simple-alert";
import App from './App.vue';
Vue.use(VueAxios, axios);

import Datetime from 'vue-datetime'
// You need a specific loader for CSS files
import 'vue-datetime/dist/vue-datetime.css'
 
Vue.use(Datetime)

import VueHtmlToPaper from 'vue-html-to-paper';

 
const options = {
  name: '_blank',
  specs: [
    'fullscreen=yes',
    'titlebar=yes',
    'scrollbars=yes'
  ],
  styles: [
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
    'https://unpkg.com/kidlat-css/css/kidlat.css'
  ]
}
 
Vue.use(VueHtmlToPaper, options);
 
// or, using the defaults with no stylesheet
 
Vue.use(VueHtmlToPaper);

Vue.use(VueSimpleAlert);
import HomeComponent from './components/HomeComponent.vue';
import IndexComponent from './components/IndexComponent.vue';


import CreateHistoryComponent from './components/History/CreateHistoryComponent.vue';
import IndexHistoryComponent from './components/History/IndexHistoryComponent.vue';
//import EditHistoryComponent from './components/History/EditHistoryComponent.vue';

import CreateDvdsComponent from './components/Dvd/CreateDvdsComponent.vue';
import IndexDvdComponent from './components/Dvd/IndexDvdComponent.vue';
import ReturnDvdComponent from './components/Dvd/ReturnDvdsComponent.vue';
//import EditDvdComponent from './components/Dvd/EditDvdComponent.vue';

import CreateCustomersComponent from './components/Customer/CreateCustomersComponent.vue';
import IndexCustomersComponent from './components/Customer/IndexCustomersComponent.vue';
//import EditCustomerComponent from './components/Customer/EditDvdComponent.vue';

import LoginComponent from './components/Auth/LoginComponent.vue';
import RegisterComponent from './components/Auth/RegisterComponent.vue';



import swal from 'sweetalert2';
window.swal = swal;
window.Fire = new Vue();

const routes = [
    {
        name: 'index',
        path: '/',
        component: IndexComponent
    },
    {
        name: 'home',
        path: '/home',
        component: HomeComponent
    },
  
    
//History
    {
        name: 'HistoryCreate',
        path: '/history/Create',
        component: CreateHistoryComponent
    },
    {
        name: 'HistoryIndex',
        path: '/history',
        component: IndexHistoryComponent
    },

    //Dvd
    {
        name: 'DvdCreate',
        path: '/dvd/Create',
        component: CreateDvdsComponent
    },
    {
        name: 'DvdIndex',
        path: '/dvd',
        component: IndexDvdComponent
    },
    {
        name: 'ReturnDvd',
        path: '/dvd/return',
        component:ReturnDvdComponent
    },
    //customer
    {
        name: 'CustomerCreate',
        path: '/customers/Create',
        component: CreateCustomersComponent
    },
    {
        name: 'CustomerIndex',
        path: '/customers',
        component: IndexCustomersComponent
    },
    //Auth
    {
        name: 'Login',
        path: '/login',
        component: LoginComponent
    },
    {
        name: 'Register',
        path: '/register',
        component: RegisterComponent
    },
  ];


const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');