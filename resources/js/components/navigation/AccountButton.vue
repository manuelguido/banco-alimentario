<template>
  <mdb-dropdown tag="li" class="nav-item mobile-hide uns" dropleft>
    <mdb-dropdown-toggle tag="a" navLink class="btn btn-dropdown" slot="toggle" waves-fixed><i class="fas fa-user-alt black-alpha-50 mr-2"></i>Cuenta</mdb-dropdown-toggle>
    <mdb-dropdown-menu>
		  <h6 class="dropdown-header text-left pl-2 black-alpha-60">Cuenta</h6>
			<mdb-dropdown-item href="/profile">Perfil</mdb-dropdown-item>
			<mdb-dropdown-item href="/dashboard">Dashboard</mdb-dropdown-item>
    	<div class="dropdown-divider m-0 p-0"></div>
      <mdb-dropdown-item @click="logout()">Cerrar sesión</mdb-dropdown-item>
    </mdb-dropdown-menu>
  </mdb-dropdown>
</template>

<script>
import { mdbDropdown, mdbDropdownMenu, mdbDropdownToggle, mdbDropdownItem } from 'mdbvue';
export default {
  name: 'AccountButton',
  components: {
    mdbDropdown,
    mdbDropdownMenu,
    mdbDropdownToggle,
    mdbDropdownItem,
  },
  data () {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
    }
  },
  methods: {
      logout() {
        axios.post('/logout', {
          csrf: this.csrf
        }).then(response => {
          window.location.href = "/";
        }).catch(error => {
          console.log(error);
        }); 
      }
    }
}
</script>

<style scoped>
.btn-dropdown {
  background: rgba(0,0,0,0.06);
  border-radius: 8px !important;
	box-shadow: none !important;
  color: rgba(0,0,0,0.40); 
}
</style>