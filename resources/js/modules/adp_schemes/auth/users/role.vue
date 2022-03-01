<template>
  <span>
    {{ data !== null ? (data.role ? data.role : "N/A") : "N/A" }}
  </span>
</template>

 <script>
export default {
  props: {
    data: {},
  },
};
</script>
