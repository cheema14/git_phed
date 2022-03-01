<template>
  <span>
    {{ data.counter.toLocaleString() }}
  </span>
</template>

<script>
    export default {
        props: {
            data: {},
        },
    };
</script>