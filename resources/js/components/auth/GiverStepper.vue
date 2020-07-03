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
          <!-- <span class="step-order mr-lg-1">{{step.order}}</span> -->
          <span class="step-order mr-lg-1"><i :class="step.icon"></i></span>
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
        <!-- Row -->
        <div class="row justify-content-center">
          <!-- Col -->
          <div class="col-12 col-lg-6">
            <!-- Step 1  -->
            <div class="step-content">
              <h3 class="h5 mb-4">Datos de su organización</h3>
            </div>
            <!-- Step 2 -->
            <div class="step-content">
              <h3 class="h5 mb-4">Datos de la persona responsable</h3>

            </div>
            <!-- Step 3 -->
            <div class="step-content">
              <h3 class="h5 mb-4">Dirección de la organización</h3>

            </div>
            <!-- Step 4 -->
            <div class="step-content">
              <h3 class="h5 mb-3">Datos de su cuenta</h3>
              <p class="text-black-c my-4">Estos son sus datos que usará para poder ingresar en el sitio una vez registrado</p>
              <div class="form-group">
                <form-label title="Email"></form-label>
                <input class="form-control" type="email" v-model="user.email" placeholder="ejemplo@gmail.com" required>
              </div>

              <div class="form-group">
                <form-label title="Contraseña"></form-label>
                <input class="form-control" type="password" v-model="user.password" placeholder="********" required>
              </div>

              <div class="form-group">
                <form-label title="Repetir contraseña"></form-label>
                <input class="form-control" type="password" v-model="user.password_confirm" placeholder="********" required>
              </div>
            </div>

          </div>
          <!-- /.Col -->
        </div>
        <!-- /.Row -->

      </div>
      <!-- /.Stepper content -->

      <!-- Stepper control -->
      <div class="stepper-control">
        <span v-if="el > 1" class="btn waves-effect ls-button-cancel" @click="back()">
          <i class="fas fa-chevron-left mr-3"></i>
          Atrás
        </span>
      
        <span class="btn waves-effect ls-button-success float-right" @click="next()">
          {{next_text}}
          <i v-if="notFinished()" class="fas fa-chevron-right ml-3"></i>
        </span>
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
            name: 'Organización',
            icon: 'fas fa-building'
          },
          {
            order: 2,
            name: 'Persona responsable',
            icon: 'fas fa-user'
          },
          {
            order: 3,
            name: 'Dirección',
            icon: 'fas fa-map-marker-alt'
          },
          {
            order: 4,
            name: 'Cuenta',
            icon: 'fas fa-unlock-alt'
          }
        ],
        user: {
          company_name: '',
          company_cuit: '',
          email: '',
          password: '',
          password_confirm: ''
        }
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
      },
      // Register the new user
      register () {
        this.loading = true
        this.status_message = ''
        const path = '/api/giver/register'
        axios.post(path, {
          email: this.user.email,
          password: this.user.password,
          password_confirm: this.user.password_confirm
        }).then((res) => {
          if (res.data.success) {
            window.location.href = '/dashboard'
          } else {
            this.loading = false
            this.status_message = res.data.message
          }
        }).catch((err) => {
          console.log(err)
        })
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
  min-height: 500px;
  padding-bottom: 40px;
  padding-top: 40px;
}

/*------------------------------------
  Transition
------------------------------------*/
.stepper .steps, .stepper .step {
  transition: .1s all !important;
}
</style>
