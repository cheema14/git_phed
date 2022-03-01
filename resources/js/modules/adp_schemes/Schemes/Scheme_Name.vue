<template>
  <span>
     {{(data!==null) ? (data.scheme_name ? data.scheme_name: "N/A") :"N/A"}}
  </span>
</template>

 <script>
export default {
  props: {
    data: {}
  }
};
</script>
