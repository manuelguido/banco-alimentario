<template>
  <!-- Card -->
  <div class="card primary-card shadow-none mb-4">
    <!-- Tick -->
    <div class="tick"><i class="fas fa-check fa-lg"></i></div>
    <!-- Card body -->
    <div class="card-body py-lg-4 py-xl-5">
      <!-- Hashtag -->
      <p class="hashtag mb-1">#{{ content.hashtag }}</p>
      <!-- Title -->
      <h2 class="h5-responsive mb-2">{{ content.title }}</h2>
      <!-- Text -->
      <p class="mb-2">{{ content.text }}</p>
      <!-- Button -->
      <a v-if="content.button" class="btn btn-block btn-card mt-4" v-waves>
        <span class="w600">{{ content.button_text }}</span>
        <i class="fas fa-chevron-right ml-3"></i>
      </a>
    </div>
    <!-- /.Card body -->
  </div>
  <!-- /.Col -->
</template>

<script>
export default {
  props: {
    content: {
      type: Object,
      default: () => {},
    },
  },
};
</script>

<style scoped>
/* Card */
.primary-card {
  border-radius: 18px;
}

/* Hashtag */
.hashtag {
  color: #7a7f83;
}

/* Button */
.btn-card {
  color: #00dcd3 !important;
  border-radius: 0;
  border: 2px solid #00dcd3;
  padding: 1.5em 0.5em;
  box-shadow: none !important;
}

/* On web */
@media (min-width: 992px) {
  /* Card */
  .primary-card {
    height: 100%;
  }
  /* Tick */
  .tick {
    border-radius: 100px;
    background: #00dcd3;
    height: 45px;
    width: 45px;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: -15px;
    right: -15px;
  }
}

/* On mobile */
@media (max-width: 992px) {
  /* Tick */
  .tick,
  .tick * {
    display: none !important;
  }
}
</style>