<template>
  <mdb-navbar id="dashboard-navbar" color="white" light class="dashboard-navbar shadow-none py-3 py-lg-2 py-xl-2">
    <!-- Brand -->
    <a href="/" class="navbar-brand ls-brand">
      <img src="../../../../assets/logo.jpg" class="uns lazyload">
    </a>
		<!-- /.Brand -->
    <mdb-navbar-toggler>
			<mdb-navbar-nav right>
				<span class="web-hide">
					<!-- Items -->
    			<items :routes=routes></items>
				</span>
				<!-- Account button -->
				<account-button></account-button>
      </mdb-navbar-nav>
    </mdb-navbar-toggler>
  </mdb-navbar>
</template>

<script>
  import { mdbNavbar, mdbNavbarBrand, mdbNavbarToggler, mdbNavbarNav, mdbNavItem, mdbDropdown, mdbDropdownMenu, mdbDropdownToggle, mdbInput, mdbDropdownItem, mdbBtn } from 'mdbvue';
	import items from './Items'
	export default {
    name: 'Navbar',
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
			mdbInput,
			mdbBtn,
			items
		},
		props: {
			routes: Array
		},
		data () {
			return {
				input_search: '',
			}
		},
		created () {
			this.createListeners();
    },
    mounted () {
			this.handleScroll();
    },
    destroyed () {
			this.removeListeners();
    },
    methods: {
			createListeners() {
				window.addEventListener('scroll', this.handleScroll);
				window.addEventListener('onresize', this.handleScroll);
			},

			removeListeners() {
				window.removeEventListener('scroll', this.handleScroll);
				window.removeEventListener('onresize', this.handleScroll);
			},
			
			// Makes the navbar big
			bigNavbar (nav) {
				nav.classList.add('py-lg-3');
				nav.classList.remove('py-lg-1');
			},

			// Makes the navbar mobile
			mobileNavbar (nav) {
				nav.classList.add('py-lg-1');
				nav.classList.remove('py-lg-3');
			},

			// Makes the navbar small
			smallNavbar (nav) {
				nav.classList.add('py-lg-1');
				nav.classList.remove('py-lg-3');
			},

			// Handles scroll listener
			handleScroll () {
				var nav = document.querySelector('#dashboard-navba2r');
				let desktopScreen = window.innerWidth >= 992;
				// Top page
        if (window.scrollY <= 100 && desktopScreen) {
					this.bigNavbar(nav);
				} else if (!desktopScreen) {
					this.mobileNavbar(nav);
				} else {
					this.mobileNavbar(nav);
				}
			},
		}
  }
</script>

<style>
.dashboard-navbar,
.dashboard-navbar * {
	transition: 0.1s all !important;
}
</style>

<style scoped>
.dashboard-navbar {
	z-index: 1040 !important;
	border-bottom: 1px solid #eee;
}

@media (max-width: 992px) {
	.dashboard-navbar {
		position: fixed !important;
		width: 100vw;
		box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
	}
}


/* Brand */
.ls-brand img {
  height: 60px;
}
.ls-brand:hover {
  opacity: .8 !important;
}


/* Buttons */
.btn-dropdown {
	background: var(--black-alpha-03);
	box-shadow: none !important;
	border-radius: 50px !important;
}
</style>