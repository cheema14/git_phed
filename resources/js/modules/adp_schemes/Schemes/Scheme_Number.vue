<template>
  <span>
     {{(data!==null) ? (data.id ? data.id: "N/A") :"N/A"}}
  </span>
</template>

 <script>
export default {
  props: {
    data: {}
  }
};
</script>
