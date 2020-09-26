<template>
  <!-- Sidenav -->
  <div class="sidenav mobile-hide uns">
    <!--Header-->
    <div class="navbar shadow-none py-3">
      <div class="navbar-brand">
        <span class="w-600">{{sidebar_title}}</span>
			  <span class="w-300">Dashboard</span>
      </div>
    </div>
    <!-- Items -->
    <items :routes=routes></items>
    <!-- /.Items -->
  </div>
  <!-- /.Sidenav -->
</template>

<script>
import items from './Items';

export default {
  name: 'sideNav',
  props: {
    routes: Array
  },
  components: {
    'items': items
  },
  data () {
    return {
      sidebar_title: 'COVID'
    }
  }
}
</script>

<style scoped>
@media (min-width: 992px) {
  /* Sidebar */
  .sidenav {
    height: 100vh !important;
    position: fixed;
    background: #fff;
    /* box-shadow: 0 .07em .425em 0 rgba(0,0,0,.225) !important; */
    width: 280px;
    left: 0;
    top: 0;
    z-index: 1090;
    /* padding-top: 150px; */
  }
}
@media (max-width: 992px) {
  .sidenav {
    display: none !important;
  }
}

.navbar-brand,
.navbar-brand * {
  color: var(--primary) !important;
}

</style>
