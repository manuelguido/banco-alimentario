<template>
  <div>
  	<!-- Navigation bar -->
    <navbar v-if="navbar" :routes=routes></navbar>
		<!-- /.Navigation bar -->

		<!-- Sidebar -->
		<sidebar v-if="sidebar" :routes=routes></sidebar>
		<!-- /.Sidebar -->
  </div>
</template>

<script>
import sidebar from './sidebar/Sidebar' 
import navbar from './navbar/Navbar'

export default {
  components: {
		'sidebar': sidebar,
		'navbar': navbar
  },
  props: {
    navbar: {
      type: Boolean,
      default: true,
    },
    sidebar: {
      type: Boolean,
      default: false,
    }
  },
	data () {
		return {
			routes: [
				{
					url: '/dashboard/home',
					icon: 'fad fa-tachometer-fast',
					name: 'Inicio',
        },
				{
					url: '/dashboard/medics',
					icon: 'fad fa-user-nurse',
					name: 'Médicos',
				},
				{
					url: '/dashboard/patients',
					icon: 'fad fa-user-alt',
					name: 'Pacientes',
				},
				{
					url: '/dashboard/reports',
					icon: 'fad fa-chart-pie',
					name: 'Reportes',
				},
			]
		}
	}  
}
</script>
