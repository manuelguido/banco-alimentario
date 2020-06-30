import Vue from 'vue'
import Router from 'vue-router'

import publicRoutes from './publicRoutes'
import errorRoutes from './errorRoutes'
import authRoutes from './authRoutes'

Vue.use(Router)

var allRoutes = []
allRoutes = allRoutes.concat(
  publicRoutes,
  authRoutes,
  errorRoutes
)

const routes = allRoutes

export default new Router({
  mode: 'history',
  routes,
})
