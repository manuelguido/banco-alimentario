// Dashboard
import dashboard from '../views/layouts/Dashboard'
// Home
import home from '.././views/dashboard/Home'
// Home
import donations from '.././views/dashboard/Donations'

const routes = [
  {
    path: '/dashboard',
    name: 'dashboard',
    component: home,
    redirect: '/dashboard/home' 
  },
  {
    path: '/dashboard/home',
    name: 'dashboardHome',
    component: home
  },
  {
    path: '/dashboard/donations',
    name: 'dashboardDonations',
    component: donations
  }
]

export default routes
