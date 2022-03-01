<template>
  <span>
     {{(data!==null) ? (data.email ? data.email: "N/A") :"N/A"}}
  </span>
</template>

 <script>
export default {
  props: {
    data: {}
  }
};
</script>
