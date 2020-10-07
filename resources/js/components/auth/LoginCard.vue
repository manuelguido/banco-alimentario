<template>
  <!-- Col -->
  <div class="col-12 col-lg-9 col-xl-8 pt-lg-5 mt-5">
    <!-- Card -->
    <div class="card login-card py-4 py-lg-5">
      <!-- Card body -->
      <div class="card-body p-lg-5">
        <!-- Row -->
        <div class="row justify-content-center px-lg-4">
          <!-- Image -->
          <div class="col-12 col-lg-4 text-center mobile-hide m-auto pl-0 pr-lg-5">
            <img src="../../assets/login.png" class="donate-image uns lazyload">
          </div>
          <!-- Image -->
          
          <!-- Right side -->
          <div class="col-12 col-lg-8 bl-grey pl-lg-5">
            <!-- Title -->
            <h-title size="3" text="Iniciar sesión" class="mb-5 text-center text-lg-left"></h-title>
            <!-- Errors -->
            <p v-if="error" class="text-center danger">
              {{error.message}}
            </p>
            <!-- /.Errors -->
            <!-- Slot -->
            <slot></slot>
            <!-- /.Slot -->
          </div>
          <!-- Right side -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.Card body -->
    </div>
    <!-- /.Card -->
  </div>
  <!-- /.Col -->
</template>

<style scoped>
.donate-image {
    width: 100%;
    margin: auto;
}
@media (min-width: 992px) {
  .bl-grey {
    border-left: 1px solid #f1f3f5;
  }
}

@media (max-width: 992px) {
  .login-card {
    box-shadow: none !important;
  }
}
</style>
