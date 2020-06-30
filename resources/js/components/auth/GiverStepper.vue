<template>
  <div class="card stepper">
    <!-- Card header -->
    <div class="card-header">
      <!-- Steps -->
      <div class="steps row">
        <!-- Step -->
        <div
          v-for="step in steps" :key="step.order"
          class="step col-3"
        >
        <span class="step-order">{{step.order}}</span>
        <span class="mobile-hide">{{step.name}}</span>
        </div>

      </div>
    </div>
    <!-- /.Card header -->
    <!-- Card body -->
    <div class="card-body">
      <div class="stepper-content">
        Contenido
      </div>
      <div class="stepper-control">
        <div class="row justify-content-end">
          <span class="btn waves-effect ls-button-success">Siguiente</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'GiverStepper',
    data () {
      return {
        el: 1,
        steps: [
          {
            order: 1,
            name: 'Organización'
          },
          {
            order: 2,
            name: 'Persona responsable'
          },
          {
            order: 3,
            name: 'Dirección'
          },
          {
            order: 4,
            name: 'Contraseña'
          }
        ]
      }
    }
  }
</script>

<style scoped>
.steps {
  text-align: center;
  justify-content: center;
}
.step {
  padding: 10px 40px;
  cursor: pointer;
}
.step:hover {
  background: #f7f9fa;
}
.step-order {
  background: #eee;
  border-radius: 50px;
  height: 30px !important;
  width: 30px !important;
  padding: 3px;
  display: inline-block;
}
.step-order.active {
  background-color: var(--seed-success);
}
/* Stepper content */
.stepper .card-body {
  padding: 20px 60px;
}
.stepper-content {
  min-height: 300px;
}
</style>