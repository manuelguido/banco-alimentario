<template>
  <div class="container-fluid cont">
    <div class="row justify-content-center cont">
        <div class="m-auto col-lg-8 col-xl-7">
          <h1 class="h4 w400 mb-4">Registrarte como donante</h1>
          <giver-stepper></giver-stepper>
        </div>
      <!-- </v-col> -->
    </div>
  </div>
</template>

<script>
import giverStepper from '../../components/auth/GiverStepper'
export default {
  name: 'RegisterGiver',
  components: {
    'giver-stepper': giverStepper
  }
}
</script>

<style scoped>
.cont {
  min-height: 100vh;
  align-content: center;
}
.cont .row {
  min-height: 80vh;
}
</style>
