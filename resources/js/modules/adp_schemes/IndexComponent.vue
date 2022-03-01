<template>
  <div>
    <navbar_global/>
    <header_global/>
    
    <router-view></router-view>
    <footer_global/>
  </div>
</template>

<script>
import header_global from "./GlobalCommonComponents/HeaderComponent.vue";
import navbar_global from "./GlobalCommonComponents/NavBarComponent.vue";
import footer_global from "./GlobalCommonComponents/FooterComponent.vue";

export default {
  components: {
    header_global,
    navbar_global,
    footer_global
  },
};
</script>
