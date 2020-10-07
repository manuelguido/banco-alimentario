<template>
  <div class="container-fluid py-3">
    <div class="banner">
      <!-- Parragraph -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-6">
            <p class="h6-responsive mb-3 mb-lg-4 animated fadeInUp">
              Recibimos donaciones de alimentos aptos para el<br>
              consumo pero no comercializables, con el objeto de<br>
              entregarlos a entidades de bien público de la región.<br>
            </p>
            <!-- Title -->
            <h2 class="h3-responsive mb-4 animated fadeIn">¡Sumáte como donante!</h2>
            <a href="/register/giver" class="btn btn-register">
              Registrarse
              <i class="fas fa-chevron-right ml-3"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.banner {
  min-height: 50vh;
  width: 100%;
  background: cyan;
  border-radius: 20px;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: left;
  padding: 3% 8%;
}

.btn-register {
  border-radius: 100px;
  margin: 0 !important;
}
</style>
