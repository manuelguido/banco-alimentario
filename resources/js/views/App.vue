<template>
  <v-app id="app">
    <router-view/>
  </v-app>
</template>

<script>
export default {
  name: 'App'
}
</script>


<style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap');

#app {
  font-family: 'Nunito', sans-serif !important;
  background: var(--white-b) !important;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: left;
  color: #41444b;
  margin: 0;
  padding: 0;
}

/*--------------------------------------------------------------
  Custom vuetify classes
--------------------------------------------------------------*/
.v-btn {
  box-shadow: 0 1px .225em 0 rgba(0,0,0,.15) !important;
  font-weight: 600 !important;
}
.v-btn:hover {
  box-shadow: 0 1px .525em 0 rgba(0,0,0,.45) !important;
}


</style>
