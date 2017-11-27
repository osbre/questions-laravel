
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('answer', require('./components/Answer.vue'));

const app = new Vue({
    el: '#app',
    methods: {
        wrong_question: function (title) {
            swal({
                title: title,
                text: "",
                icon: "error",
                button: "Спробуйте ще →",
            });   
        },
        correct_question: function (text,href) {
            swal({
                title: "Правильно!",
                text: text,
                icon: "success",
                button: "Наступне запитання →",
            }).then(function () {
                window.location.href = href;                                
            })  
        },
        final: function (text,href){
            swal({
                title: "Вітаємо!",
                text: text,
                icon: "success",
                button: "У профіль →",
            }).then(function () {
                window.location.href = href;                                
            })  
        }
    }
});                
