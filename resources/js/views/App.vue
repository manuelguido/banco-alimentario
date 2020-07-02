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
@import url('https://fonts.googleapis.com/css?family=Nunito:wght@200;300;400;600;700&display=swap');

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
  Custom mdvue classes
--------------------------------------------------------------*/
/* .btn {
  padding: 9px 26px;
  font-size: 15px;
} */
.card-header {
  background: #fff;
}

</style>
