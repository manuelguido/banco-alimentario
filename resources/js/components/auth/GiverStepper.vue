<template>
  <div class="card stepper">
    <!-- Card header -->
    <div class="card-header">
      <!-- Steps -->
      <div class="steps flex">

        <!-- Step -->
        <div v-for="step in steps" :key="step.order" @click="setStep(step.order)" class="step">
          <span class="step-order mr-1" v-bind:class="step.order == el ? 'active' : '' ">{{step.order}}</span>
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
        <div class="row justify-content">
          <div class="col-6">
            <span v-if="el > 1" class="btn waves-effect ls-button-cancel" @click="back()">
              <i class="fas fa-chevron-left mr-3"></i>
              Atrás
            </span>
          </div>
          <div class="col-6 text-right">
            <span class="btn waves-effect ls-button-success" @click="next()">
              {{next_text}}
              <i v-if="this.notFinished()" class="fas fa-chevron-right ml-3"></i>
            </span>
          </div>
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
        next_text: 'Siguiente',
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
    },
    methods: {
      back () {
        if (this.el > 1) {
          this.el--
        }
      },
      next () {
        if (this.el < this.steps.length) {
          this.el++
        }
        this.next_text = (this.el == this.steps.length) ? 'Registrarme' : 'Siguiente';
      },
      setStep (val) {
        this.el = val
      },
      notFinished () {
        return (this.el < this.steps.length)
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
  cursor: pointer;
  display: inline-block;
  flex: 1;
  flex-grow: 1;
  padding: 10px 1em;
}
.step:hover {
  background: #f7f9fa;
}
.step-order {
  background: #eee;
  border-radius: 50px;
  display: inline-block;
  height: 30px !important;
  width: 30px !important;
  padding: 3px;
}
.step-order.active {
  background-color: var(--seed-success);
  color: #fff;
}
.step-order.active {
  background-color: var(--seed-success);
}
/* Stepper content */
.stepper .card-header,
.stepper .card-body {
  padding: 10px 40px;
}
.stepper-content {
  min-height: 300px;
}


/* Transitions */
.steps, .step {
  transition: 1s all !important;
}
</style>