
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

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

require('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.js')
	require('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js')
  $(function () {                
                $('#datetimepicker1').datetimepicker();
                
                $('#datetimepicker2').datetimepicker({
                  useCurrent: false //Important! See issue #1075
                });
                
                $("#datetimepicker1").on("dp.change", function (e) {
                  $('#datetimepicker2').data("DateTimePicker").minDate(e.date);
                });      
                
                $("#datetimepicker2").on("dp.change", function (e) {
                    $('#datetimepicker1').data("DateTimePicker").maxDate(e.date);
                });
            });

