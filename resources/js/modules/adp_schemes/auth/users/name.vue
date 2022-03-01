<template>
  <span>
     {{(data!==null) ? (data.name ? data.name: "N/A") :"N/A"}}
  </span>
</template>

 <script>
export default {
  props: {
    data: {}
  }
};
</script>
