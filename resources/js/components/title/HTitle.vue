<template>
  <h1 class="text-black-c mb-3" :class="'h'+size">{{text}}</h1>
</template>

<script>
  export default {
		name: 'h-title',
		props: ['text', 'size']
  }
</script>
