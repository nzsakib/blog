<template>
  <div :class="{ split: split, live: true }" v-html="data">
    
  </div>
</template>

<script>
export default {
    props: ['data', 'split'],
};
</script>

<style scoped>
.split {
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
    background: #777;
}

</style>
