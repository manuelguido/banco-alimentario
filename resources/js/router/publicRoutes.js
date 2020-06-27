import axios from 'axios'

import Home from '.././views/Home'
import Error404 from '.././views/error/404'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '*',
    name: 'Error',
    component: Error404
  }
]

export default routes
