

<template>
  <div>
    <div class="action-icons">
      <a @click="click(data)"><i class="fa fa-edit"></i></a>
      <a @click="click(data,true)"><i class="fa fa-eye"></i></a>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {},
  props: {
    data: {},
    click: {
      type: Function,
      default: () => {},
    },
  },
};
</script>
