<template>
  <div class="container-fluid cont">
    <div class="row justify-content-center">
        <div class="m-auto col-lg-8 col-xl-6">
          <!-- Title -->
          <h-title size="3" class="mb-3" text="Registrarte como donante en el sitio"></h-title>
          <p class="text-black-c mb-5">
            Así podrás comenzar a generar donaciones que serán distribuídas por el Banco Alimentario de La Plata
          </p>
          <!-- Stepper -->
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
  padding-top: 15vh;
}
</style>
