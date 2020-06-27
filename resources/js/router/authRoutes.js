import axios from 'axios'

import Login from '.././views/auth/Login'
import RegisterGiver from '.././views/auth/RegisterGiver'
import RegisterVolunteer from '.././views/auth/RegisterVolunteer'
import RegisterOrganization from '.././views/auth/RegisterOrganization'

const routes = [
  {
    path: '/login',
    name: 'Login',
    component: Login
  },
  {
    path: '/register_giver',
    name: 'RegisterGiver',
    component: RegisterGiver
  },
  {
    path: '/register_volunteer',
    name: 'RegisterVolunteer',
    component: RegisterVolunteer
  },
  {
    path: '/register_organization',
    name: 'RegisterOrganization',
    component: RegisterOrganization
  }
]

export default routes
