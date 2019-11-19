/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import { Form, HasError, AlertError } from 'vform'
import Swal from 'sweetalert2'


window.Vue = require('vue');
window.Form = Form;
window.Fire = new Vue();
window.swal = Swal;

const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.Toast = Toast;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('btn-show-modal', require('./components/modal/BtnShowModal.vue').default);
Vue.component('modal', require('./components/modal/Modal.vue').default);
Vue.component('staff-form', require('./components/modal/forms/StaffForm.vue').default);
Vue.component('incident-form', require('./components/modal/forms/IncidentForm.vue').default);
Vue.component('confirm-dialog-incidents', require('./components/confirm_dialog/ConfirmDialogIncidents.vue').default);
Vue.component('confirm-dialog-staff', require('./components/confirm_dialog/ConfirmDialogStaff.vue').default);
Vue.component('chat-component', require('./components/chat/ChatComponent.vue').default);
Vue.component('chat-client-component', require('./components/chat/ChatClientComponent.vue').default);
Vue.component('staff-notification-center', require('./components/notification_center/StaffNotificationCenter.vue').default);
Vue.component('supervisor-notification-center', require('./components/notification_center/SupervisorNotificationCenter.vue').default);





/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

