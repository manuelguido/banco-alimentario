<template>
  <div class="mb-4 py-3 px-4 user-data">
    <div class="wrapper">
      <span>
        <i class="fad fa-user-alt mr-2"></i>
        {{user}}
      </span>
      <span><i class="fas fa-chevron-down"></i></span>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    user: {
      type: String,
      default: 'Nombre usuario'
    }
  }
}
</script>

<style scoped>
.user-data {
  color: var(--primary);
}
.user-data .wrapper {
  display: flex;
  flex-direction:row;
  flex-wrap:wrap;
  justify-content:space-between;
  cursor: pointer;
}
.user-data:hover {
  background: var(--primary-light);
}
</style>
