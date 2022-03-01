<!--Navbar-->
<template>
  <div v-if="$route.meta.mod_header">
    <nav
      class="
        navbar navbar-expand-md
        sticky-top
        navbar-light
        bg-white
        navbar-erp
        shadow-sm
      "
    >
      <div class="container">
        <router-link class="navbar-brand d-flex align-items-center" to="/">
          <span
            ><img
              src="images/gov-logo.png"
              class="img-fluid"
              alt="Punjab Logo"
              width="53"
          /></span>
          <span class="logo-text ms-2">Phed<span>erp</span> </span>
        </router-link>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page">Home</a>
            </li>
            <li v-if="loggedIn" class="nav-item">
              <a class="nav-link">Reports</a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a
                class="nav-link"
                href="#"
                id="navbarDropdown"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="far fa-bell position-relative notification-bell">
                  <span class=""
                    >5
                    <span class="visually-hidden">unread messages</span></span
                  >
                </i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item">Action</a></li>
                <li><a class="dropdown-item">Another action</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" >Something else here</a>
                </li>
              </ul>
            </li> -->
            <li v-if="loggedIn" class="vr mx-3 d-md-block d-none"></li>
            <li v-if="loggedIn" class="nav-item dropdown">
              <a
                class="nav-link"
                href="#"
                id="navbarDropdown2"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <img
                  src="images/gov-logo.png"
                  class="img-fluid rounded-circle"
                  alt="User Image"
                  width="25"
                  height="25"
                />
                Administrator User
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                <li><a v-if="isAdmin" class="dropdown-item">User Module</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a v-on:click="logoutUser()" class="dropdown-item cursor-pointer">logout</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>
<script>
export default {
  data() {
    return {
      loggedIn: false,
      isAdmin:false
    };
  },
  created() {
    this.toggleElementsVisibility();
  },
  mounted(){
    this.$root.$on("listenLoginStatus", () => {
      this.toggleElementsVisibility();
    })
  },
  methods: {
    toggleElementsVisibility() {
      if (this.$route.path == "/login") {
        this.loggedIn = false;
      } else {
        this.loggedIn = true;
        this.checkAdmin();
      }
    },
    logoutUser() {
      localStorage.removeItem("phed_erp_access_token");
      localStorage.removeItem("phed_erp_email");
      localStorage.removeItem("phed_erp_name");
      localStorage.removeItem("phed_erp_is_admin");

      this.$router.push('/login');
      this.$root.$emit('listenLoginStatus');
    },
    checkAdmin(){
      console.log(localStorage.getItem('phed_erp_is_admin'));
      if(localStorage.getItem('phed_erp_is_admin') == '1'){
        this.isAdmin=true;
      }
      else{
        this.isAdmin=false;
      }
    }
  },
};
</script>
<style scoped>
.cursor-pointer {
  cursor: pointer;
}
</style>