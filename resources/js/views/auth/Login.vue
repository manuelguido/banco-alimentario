<template>
  <div class="container-fluid cont">
    <div class="row cont-row justify-content-center">
        <div class="m-auto col-md-10 col-lg-8 col-xl-5">

          <!-- Card -->
          <div class="card py-5">
            <!-- Card body -->
            <div class="card-body p-5">
              <div class="row justify-content-center px-4">

                <div class="col-12 col-lg-4 text-center mobile-hide m-auto pl-0 pr-lg-5">
                  <img src="../../assets/login.png" class="donate-image uns lazyload">
                </div>

                <!-- <auth-left-panel img_url="{{ asset('img/login.png') }}"></auth-left-panel> -->

                <div class="col-12 col-lg-8 bl-grey pl-lg-5">

                  <!-- Title -->
                  <h-title size="3" text="Iniciar sesión" class="mb-5 text-center text-lg-left"></h-title>

                  <p v-if="error" class="text-center danger">
                    {{error.message}}
                  </p>

                  <form autocomplete="off" @submit.prevent="login" method="post">
                    <div class="form-group mb-4">
                      <form-label for="password" title="Email"></form-label>
                      <input type="email" class="form-control" placeholder="enterprise@dominio.com" v-model="username" required autofocus>
                    </div>

                    <div class="form-group mb-4">
                      <form-label for="password" title="Contraseña"></form-label>
                      <input type="password" class="form-control" v-model="password" placeholder="Contraseña" required autofocus>
                    </div>

                    <div class="form-group row mb-0 justify-content-end mt-5">
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block m-0 px-5">Entrar</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- /.Card body -->
          </div>
          <!-- /.Card -->

        </div>
      <!-- </v-col> -->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      username: null,
      password: null,
      error: null
    };
  },
  methods: {
    login() {
      this.$store
        .dispatch("retrieveToken", {
          username: this.username,
          password: this.password
        })
        .then(response => {
          this.$router.push({ name: "dashboard" });
        })
        .catch(error => {
          this.error = error.response.data;
        });
    }
  }
};
</script>

<style scoped>
.cont {
  min-height: 100vh;
  align-content: center;
}
.cont-row {
  min-height: 90vh;
}
.donate-image {
    width: 100%;
    margin: auto;
}
@media (min-width: 992px) {
  .bl-grey {
    border-left: 1px solid #f1f3f5;
  }
}
</style>
