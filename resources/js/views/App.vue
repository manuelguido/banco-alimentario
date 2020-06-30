<template>
  <div id="app">
    <navbar></navbar>
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>


<style>
@import url('https://fonts.googleapis.com/css3?family=Nunito:wght@200;300;400;600;700&display=swap');

#app {
  font-family: 'Nunito', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: left;
  color: #41444b;
  margin: 0;
  padding: 0;
}
body {
  background-color: var(--white-b) !important;
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
