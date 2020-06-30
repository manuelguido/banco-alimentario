import Error404 from '.././views/error/Error404'

const routes = [
  {
    path: '*',
    name: 'Error',
    component: Error404
  }
]

export default routes
