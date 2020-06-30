<template>
  <v-container class="cont" align="center" fill-height>
    <v-row justify="center">
        <v-col lg="7" xl="6">
          <h1 class="h5 w400 text-black-b mb-6">Registrarte como donante</h1>
          <giver-stepper></giver-stepper>
        </v-col>
      <!-- </v-col> -->
    </v-row>
  </v-container>
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
  min-height: 50vh;
  align-content: center;
}
.row {
  height: 80% !important;
}
</style>
