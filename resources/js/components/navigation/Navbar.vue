<template>
  <mdb-navbar class="navigation py-2 uns" color="none" light>
    <a class="ls-brand" href="/">
      <img src="../../assets/logo.jpg" class="donate-image uns lazyload">
    </a>
    <mdb-navbar-toggler>
      <mdb-navbar-nav right>
        <!-- Links -->
        <mdb-dropdown v-if="! auth" tag="li" class="nav-item">
          <mdb-dropdown-toggle class="nav-link" tag="a" navLink slot="toggle" waves-fixed>Asociate</mdb-dropdown-toggle>
          <mdb-dropdown-menu>
            <a class="dropdown-item" href="/register/giver">Como donante</a>
            <a class="dropdown-item" href="/register/volunteer">Como voluntario</a>
          </mdb-dropdown-menu>
        </mdb-dropdown>
        <a
          v-for="link in links" :key="link.name"
          :href="link.url"
          class="nav-item"
        ><span class="nav-link">{{link.name}}</span>
        </a>
        <!-- Login -->
        <mdb-dropdown v-if="auth" tag="li" class="nav-item mobile-hide uns" dropleft>
          <mdb-dropdown-toggle tag="a" navLink class="btn btn-dropdown" slot="toggle" waves-fixed><i class="fas fa-user-alt black-alpha-50 mr-2"></i>Cuenta</mdb-dropdown-toggle>
          <mdb-dropdown-menu>
						<h6 class="dropdown-header text-left pl-2 black-alpha-60">Cuenta</h6>
						<mdb-dropdown-item href="/profile">Perfil</mdb-dropdown-item>
						<mdb-dropdown-item href="/dashboard">Dashboard</mdb-dropdown-item>
      			<div class="dropdown-divider m-0 p-0"></div>
            <mdb-dropdown-item href="/logout">Cerrar sesión</mdb-dropdown-item>
          </mdb-dropdown-menu>
        </mdb-dropdown>
        <a v-else href="/login" class="btn btn-sm btn-login ls-s-rounded m-0 px-2">
          <i class="fas fa-sign-in-alt m-0"></i>
          <span class="ml-3 web-hide">Iniciar sesión</span>
        </a>
      </mdb-navbar-nav>
    </mdb-navbar-toggler>
  </mdb-navbar>
</template>

<script>
  import { mdbNavbar, mdbNavbarBrand, mdbNavbarToggler, mdbNavbarNav, mdbNavItem, mdbDropdown, mdbDropdownMenu, mdbDropdownToggle, mdbInput, mdbDropdownItem } from 'mdbvue';
  export default {
    name: 'NavbarPage',
    components: {
      mdbNavbar,
      mdbNavbarBrand,
      mdbNavbarToggler,
      mdbNavbarNav,
      mdbNavItem,
      mdbDropdown,
      mdbDropdownMenu,
      mdbDropdownToggle,
      mdbDropdownItem,
      mdbInput
    },
    props: {
      auth: {
        type: Boolean,
        default: false,
      }
    },
    data () {
      return {
        links: [
          {
            name: 'Quienes somos',
            url: '/'
          },
          {
            name: 'Destinatarios',
            url: '/'
          },
          {
            name: 'Donantes',
            url: '/'
          },
          {
            name: 'Asociate',
            url: '/'
          },
          {
            name: 'Contácto',
            url: '/contact'
          }
        ]
      }
    }
  }
</script>

<style scoped>
/* Navbar */
.navigation {
  background-color: var(--white-a);
  box-shadow: 0 1px .125em 0 rgba(0,0,0,.15) !important;
}
.navigation, .navigation * {
  transition: 0s all !important;
}
/* Brand */
.ls-brand img {
  height: 60px;
}
.ls-brand:hover {
  opacity: .8 !important;
}

.nav-item {
  color: var(--black-a);
  font-weight: 400;
  text-decoration: none !important;
}
.nav-item:hover .nav-link {
  color: var(--black-c) !important;
}
@media (min-width: 992px) {
  .navigation {
    padding-left: 40px;
    padding-right: 40px;
  }
  .nav-item {
    margin-right: 20px;
  }
  .nav-item:last-child {
    margin-right: 0;
  }
}

/* Login button */
.btn-login {
  background-color: #313131;
  color: #fff !important;
}
@media (min-width: 992px) {
  .btn-login i {
    font-size: 22px;
  }
}
@media (max-width: 992px) {
  .btn-login i {
    font-size: 12px;
  }
}



.btn-dropdown {
  background: rgba(0,0,0,0.06);
  border-radius: 8px !important;
	box-shadow: none !important;
  color: rgba(0,0,0,0.40);
  
}
</style>
