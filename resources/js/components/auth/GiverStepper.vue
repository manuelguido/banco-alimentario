<template>
  <v-stepper v-model="e1">

    <!-- Stepper Header -->
    <v-stepper-header>

      <!-- Steps -->
      <v-stepper-step v-for="step in steps" :key="step.name"
        editable
        :step=step.number
      >{{step.name}}</v-stepper-step>

    </v-stepper-header>
    <!-- /.Stepper Header -->

    <!-- Stepper Items -->
    <v-stepper-items>

      <!-- Step 1 -->
      <v-stepper-content step="1">

        <div class="stepper-card">
          <h2 class="h6 text-black-c my-4">Información de la organización</h2>
          <v-text-field label="Main input" :rules="rules" hide-details="auto"></v-text-field>
        </div>

        <v-row>
          <v-col cols="12" class="text-right">
            <v-btn color="primary" @click="e1 = 2">Siguiente</v-btn>
          </v-col>
        </v-row>

      </v-stepper-content>

      <!-- Step 2 -->
      <v-stepper-content step="2">
        <v-card class="mb-12" color="grey lighten-1" height="400px"></v-card>

        <v-row>
          <v-col cols="6">
            <v-btn class="ls-button-cancel" @click="e1 = 1"><i class="fas fa-chevron-left mr-3"></i>Atrás</v-btn>
          </v-col>
          <v-col cols="6" class="text-right">
            <v-btn color="primary" @click="e1 = 3">Siguiente<i class="fas fa-chevron-right ml-3"></i></v-btn>
          </v-col>
        </v-row>
      </v-stepper-content>

      <!-- Step 3 -->
      <v-stepper-content step="3">
        <v-card class="mb-12" color="grey lighten-1" height="400px"></v-card>

        <v-btn color="primary" @click="e1 = 4">Siguiente</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>

      <!-- Step 4 -->
      <v-stepper-content step="4">
        <v-card class="mb-12" color="grey lighten-1" height="400px"></v-card>

        <v-btn color="primary" @click="submit">Enviar</v-btn>

        <v-btn text>Cancel</v-btn>
      </v-stepper-content>

    </v-stepper-items>
    <!-- /.Stepper Items -->

  </v-stepper>
</template>


<script>
  export default {
    data () {
      return {
        e1: 1,
      }
    },
  }
</script>

<script>
export default {
  data () {
    return {
      e1: 1,
      steps: [
        {
          name: 'Organización',
          number: 1
        },
        {
          name: 'Persona responsable',
          number: 2
        },
        {
          name: 'Dirección',
          number: 3
        },
        {
          name: 'Contraseña',
          number: 4
        }
      ]
    }
  }
}
</script>

<style scoped>
.stepper-card {
  height: 400px;
}
</style>