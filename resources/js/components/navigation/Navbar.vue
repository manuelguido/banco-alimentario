<template>
  <mdb-navbar class="navigation fixed-top py-3 uns" color="none" light>
    <router-link class="ls-brand" to="/">Banco alimentario</router-link>
    <mdb-navbar-toggler>
      <mdb-navbar-nav right>
        <!-- Links -->
        <mdb-dropdown tag="li" class="nav-item">
          <mdb-dropdown-toggle class="nav-link" tag="a" navLink slot="toggle" waves-fixed>Asociate</mdb-dropdown-toggle>
          <mdb-dropdown-menu>
            <router-link class="dropdown-item" to="/register_giver">Como donante</router-link>
            <router-link class="dropdown-item" to="/register_volunteer">Como voluntario</router-link>
          </mdb-dropdown-menu>
        </mdb-dropdown>
        <router-link
          v-for="link in links" :key="link.name"
          :to="link.url"
          class="nav-item"
        ><span class="nav-link">{{link.name}}</span>
        </router-link>
        <!-- Login -->
        <router-link to="/login" class="btn btn-sm btn-login ls-s-rounded m-0 px-2">
          <i class="fas fa-sign-in-alt m-0"></i>
          <span class="ml-3 web-hide">Iniciar sesión</span>
        </router-link>
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
            url: '/'
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
/* Brand */
.ls-brand {
  color: var(--black-a);
  font-size: 1.2em;
  font-weight: 400;
  text-decoration: none !important;
}
.ls-brand:hover {
  color: var(--black-c);
}

.nav-item {
  color: var(--black-a);
  font-weight: 400;
  text-decoration: none !important;
  transition: 0s all !important;
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
</style>
