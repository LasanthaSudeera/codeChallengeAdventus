/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue").default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Filter
Vue.filter("nameStandard", function (words) {
    var separateWord = words.toLowerCase().split(" ");
    for (var i = 0; i < separateWord.length; i++) {
        separateWord[i] =
            separateWord[i].charAt(0).toUpperCase() +
            separateWord[i].substring(1);
    }
    return separateWord.join(" ");
});

Vue.filter("celsiusInFahrenheit", function (value) {
    return ((value * 9) / 5 + 32).toFixed(2);
});

Vue.filter("myDateWithTime", function (date) {
    return moment(date).format("dd, MMM Do YYYY, HH:mm a");
});

// Module Imports

// SweetAlert
import Swal from 'sweetalert2'
window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

window.Toast = Toast;

//Moment JS
import moment from "moment";
window.moment = moment;

// DataTable
Vue.component(
    "data-table",
    require("./components/modules/DataTable.vue").default
);

// vForm
import Form from "vform";
import Vue from "vue";
window.Form = Form;

// Laravel Vue Pagination
Vue.component('pagination', require('laravel-vue-pagination'));


// UI Imports

// Home
Vue.component(
    "home-component",
    require("./components/main/home/HomeComponent.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: "#app",
});
