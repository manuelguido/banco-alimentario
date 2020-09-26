// Dashboard
import dashboard from '../views/layouts/Dashboard'
// Home
import home from '.././views/dashboard/Home'

const routes = [
  { 
    path: '/admin',
    redirect: '/dashboard/home', 
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: dashboard,
    redirect: '/dashboard/home',
    meta: {
      requiresAuth: true,
    },
    children: [
      {
        path: '/dashboard/home',
        name: 'dashboardHome',
        component: home
      }
    ]
  },
]

export default routes
