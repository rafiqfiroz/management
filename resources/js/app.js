
require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router';
import { routes } from './Router/router';

//-----------------Vuex --------

import Vuex from 'vuex';
Vue.use(Vuex);

import StoreData from './Store/store';

const store = new Vuex.Store(
    StoreData
  );


Vue.use(VueRouter)
import Swal from 'sweetalert2';
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.Toast = Toast;

//------------vform------
import Form from 'vform'
import HasError from 'vform'
import AlertError from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;




const router = new VueRouter({
    routes,
    mode: "history"
});

// router.beforeEach((to,from,next)=>{
//   document.title = `${to.meta.title}`;
//   next();
// })

import User from './Helper/User';
window.User = User;

import './Helper/mixin';



import VueMeta from 'vue-meta';
Vue.use(VueMeta)
const app = new Vue({
    el: '#app', router,store,
});
