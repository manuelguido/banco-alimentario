<template>
  <div>
    <navbar />
    <div class="container-fluid justify-content-center align-items-center py-5">
      <div class="row py-lg-5">
        <div class="m-auto col-md-10 col-lg-8 col-xl-5">
          <!-- Card -->
          <div class="card login-card p-4">
            <!-- Card body -->
            <div class="card-body p-5">
              <div class="row justify-content-center px-4">
                <div
                  class="col-12 col-lg-4 text-center mobile-hide m-auto pl-0 pr-lg-5"
                >
                  <img
                    :src="`${image_path()}/login.png`"
                    class="donate-image uns lazyload"
                  />
                </div>

                <!-- <auth-left-panel img_url="{{ asset('img/login.png') }}"></auth-left-panel> -->

                <div class="col-12 col-lg-8 bl-grey pl-lg-5">
                  <!-- Title -->
                  <h-title
                    size="3"
                    text="Iniciar sesión"
                    class="mb-5 text-center text-lg-left"
                  />

                  <p v-if="error" class="text-center danger">
                    {{ error.message }}
                  </p>

                  <form
                    autocomplete="off"
                    @submit.prevent="login"
                    method="post"
                  >
                    <div class="form-group mb-4">
                      <soft-input
                        type="email"
                        placeholder="ej: nombre@gmail.com"
                        v-model="username"
                        required
                        label="Email"
                      />
                    </div>

                    <div class="form-group mb-4">
                      <form-label for="password" title="Contraseña" />
                      <input
                        type="password"
                        class="form-control"
                        v-model="password"
                        placeholder="Ingresá tu contraseña"
                        required
                        autofocus
                      />
                    </div>

                    <div class="form-group row mb-0 justify-content-end mt-5">
                      <div class="col-12">
                        <button
                          type="submit"
                          class="btn btn-primary btn-block m-0 px-5"
                        >
                          Entrar
                        </button>
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
  </div>
</template>

<script>
import assetMixin from "../../mixins/assetMixin";
import softInput from "../../components/forms/soft-input";
import SoftInput from "../../components/forms/soft-input.vue";

export default {
  mixins: [assetMixin],
  components: {
    softInput,
  },
  data() {
    SoftInput;
    return {
      username: null,
      password: null,
      error: null,
    };
  },
  methods: {
    login() {
      this.$store
        .dispatch("retrieveToken", {
          username: this.username,
          password: this.password,
        })
        .then((response) => {
          this.$router.push({ name: "dashboard" });
        })
        .catch((error) => {
          this.error = error.response.data;
        });
    },
  },
};
</script>

<style scoped>
.cont {
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

.login-card {
  background: #fff;
  border-radius: 5px !important;
  box-shadow: none;
}
</style>
