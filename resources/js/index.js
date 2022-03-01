import './bootstrap'
import Vue from 'vue'
import Index from './components/IndexComponent';
import "./components/mixins/helperFunctions";
import "./components/mixins/stylingFunctions";

// Set Vue globally
window.Vue = Vue
// Load Index
import DataTable from 'laravel-vue-datatable';
Vue.use(DataTable);

//Import View Router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import select2 from "v-select2-component";
Vue.use(select2);

import helpers from './../assets/js/store/helpers.js';
const plugin = {
  install() {
    Vue.helpers = helpers
    Vue.prototype.$helpers = helpers
  }
}
Vue.use(plugin)

import Swal from 'sweetalert2';
window.Swal = Swal;
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 5000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
});
window.Toast = Toast;

//Routes
import { routes } from './routes';
// import { mroute } from './modules/management/routes';
//Register Routes
const router = new VueRouter({
  mode: 'hash',
  routes,
  hashbang: false,
  history: true,
  linkActiveClass: 'active',
});

import VueConfirmDialog from 'vue-confirm-dialog';
Vue.use(VueConfirmDialog);

Vue.component('index', Index)
const app = new Vue({
  router,
  created() {
    if (this.$route.path != '/login') {
      if (localStorage.getItem('phed_erp_access_token') == null) {
        this.$router.push('/login');
      }
      else {
        this.checkLoginIn();
      }
    }

    this.$root.$on("checkLoginStatus", () => {
      if(this.getCookie('redirected')){

      }
      else{
        this.checkLoginIn();
      }
      
    })
  },
  methods: {
    checkLoginIn() {
      this.waitRedirect();
      axios({
        method: "get",
        url: "api/login-check",
        headers: {
          'Authorization': `Bearer ${localStorage.getItem('phed_erp_access_token')}`
        }
      })
        .then((response) => this.parseLoginCheckResponse(response))
        .catch((response) =>
          this.redirectToLogin()
        );
    },
    parseLoginCheckResponse(response) {
      if (response.data.status != true) {
        this.$router.push('/login');
      }
    },
    redirectToLogin() {
      this.$router.push('/login');
    },
    waitRedirect() {
      let name = 'redirected';
      let value = 'yes';
      var date = new Date();
      date.setTime(date.getTime() + (3 * 1000));
      var expires = "; expires=" + date.toGMTString();

      document.cookie = name + "=" + value + expires + "; path=/";
    },
    getCookie(name) {
      var match = document.cookie.match(RegExp('(?:^|;\\s*)' + name + '=([^;]*)'));
      return match ? match[1] : null;
    }
  }
}).$mount('#app');

Vue.prototype.$idd = 'abc';



// Vue.component('vue-confirm-dialog', VueConfirmDialog.default);