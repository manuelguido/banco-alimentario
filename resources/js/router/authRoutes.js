import Login from '.././views/auth/Login'
import Logout from '.././views/auth/Logout'
import RegisterGiver from '.././views/auth/RegisterGiver'
import RegisterVolunteer from '.././views/auth/RegisterVolunteer'
import RegisterOrganization from '.././views/auth/RegisterOrganization'

const routes = [
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      requiresVisitor: true,
    }
  },
  {
    path: '/logout',
    name: 'logout',
    component: Logout,
    meta: {
      requiresAuth: true,
    }
  },
  {
    path: '/register/giver',
    name: 'RegisterGiver',
    component: RegisterGiver,
    meta: {
      requiresVisitor: true,
    }
  },
  {
    path: '/register/volunteer',
    name: 'RegisterVolunteer',
    component: RegisterVolunteer,
    meta: {
      requiresVisitor: true,
    }
  },
  {
    path: '/register/organization',
    name: 'RegisterOrganization',
    component: RegisterOrganization,
    meta: {
      requiresVisitor: true,
    }
  }
]

export default routes
