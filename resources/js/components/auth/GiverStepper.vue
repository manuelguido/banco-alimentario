<template>
  <div class="card stepper">

    <!-- Card header -->
    <div class="card-header uns">
      <!-- Steps -->
      <div class="steps flex row">
        <div 
          v-for="step in steps"
          :key="step.order"
          @click="setStep(step.order)"
          class="step"
          v-bind:class="step.order == el ? 'active' : '' "
          >
          <span class="step-order mr-lg-1">{{step.order}}</span>
          <span class="step-name">{{step.name}}</span>
        </div>
      </div>
      <!-- Steps -->
    </div>
    <!-- /.Card header -->

    <!-- Card body -->
    <div class="card-body">

      <!-- Content -->
      <div class="stepper-content">
        <div
          v-for="step in steps"
          :key="step.order"
          class="step-content display-none"
          >
          contenido de step {{step.order}}
        </div>
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
              <i v-if="notFinished()" class="fas fa-chevron-right ml-3"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
    <!-- /.Card body -->

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
      setStep (val) {
        this.el = val
        this.next_text = (this.el == this.steps.length) ? 'Registrarme' : 'Siguiente';
        let steps = document.querySelectorAll('.step-content');
        for (var i = 0; i < steps.length; i++) {
          steps[i].classList.add('display-none')
        }
        steps[val - 1].classList.remove('display-none')
      },
      back () {
        if (this.el > 1) {
          this.setStep(--this.el)
        }
      },
      next () {
        if (this.el < this.steps.length) {
          this.setStep(++this.el)
        }
      },
      notFinished () {
        return (this.el < this.steps.length)
      }
    },
    mounted () {
      this.setStep(1)
    }
  }
</script>

<style scoped>
/*------------------------------------
  Stepper header
------------------------------------*/
.stepper .card-header {
  padding: 0;
  overflow: hidden;
}
.stepper .steps {
  text-align: center;
  justify-content: center;
  margin: 0 !important;
}
.stepper .step {
  cursor: pointer;
  display: inline-block;
  flex: 1;
  flex-grow: 1;
  padding: 20px .1em;
  width: auto;
}
.stepper .step-order {
  background: #eee;
  border-radius: 50px;
  display: inline-block;
  height: 30px !important;
  width: 30px !important;
  padding: 3px;
}
@media (max-width: 992px) {
  .stepper .step-name {
    display: block !important;
  }
}

/* Step hover & active */
.step:hover {
  background: #f7f9fa;
}
.step:active {
  background: #efefef;
}

/* Active step */
.stepper .step.active {
  background: #eee;
}
.stepper .step.active .step-order {
  background-color: var(--seed-success);
  color: #fff;
}

/*------------------------------------
  Stepper content
------------------------------------*/
.stepper .card-body {
  padding: 10px 40px;
}
.stepper .stepper-content {
  min-height: 300px;
  padding: 40px 10px;
}

/*------------------------------------
  Transition
------------------------------------*/
.stepper .steps, .stepper .step {
  transition: .1s all !important;
}
</style>
