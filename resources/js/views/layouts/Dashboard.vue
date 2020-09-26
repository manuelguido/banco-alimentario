<template>
  <!-- Main -->
	<main>
    <!-- Navigation -->
    <navigation sidebar></navigation>

    <!-- Dashboard layout -->
    <div class="container-fluid">
      <!-- Row -->
      <div class="row justify-content-center">
        <!-- Panel content -->
        <div class="panel-container col p-0">
          <!-- Rotative content -->
          <section class="p-0">
            <!-- Router view -->
            <router-view></router-view>
          </section>
          <!-- /.Rotative content -->
        </div>
        <!-- /.Panel content -->
      </div>
      <!-- /.Row -->
    </div>
    <!-- /.Dashboard layout -->
	</main>
  <!-- /.Main -->
</template>

<script>
import navigation from '../../components/dashboard/navigation/Navigation' 

export default {
	name: 'dashboard',
	components: {
		'navigation': navigation
  }
}
</script>

<style scoped>
@media(min-width: 992px) {
  .panel-container {
    margin-left: 280px !important;
  }
}
</style>
