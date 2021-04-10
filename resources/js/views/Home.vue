<template>
  <div>
    <navbar />
    <banner />
    <div class="container">
      <div class="row mt-4 mt-xl-5">
        <!-- Col -->
        <div
          class="col-12 col-lg-4"
          v-for="card in primary_cards"
          :key="card.id"
        >
          <!-- Card -->
          <primary-card :content="card" />
          <!-- Card -->
        </div>
        <!-- /.Col -->
      </div>
    </div>
  </div>
</template>

<script>
import banner from "../components/pages/home/Banner";
import primaryCard from "../components/pages/home/PrimaryCard";

export default {
  components: {
    banner,
    primaryCard,
  },
  data() {
    return {
      primary_cards: [
        {
          id: 1,
          hashtag: "BancoAlimentario",
          title: "Nuestra misión",
          text: "Disminuir el hambre, la desnutrición.",
          button: false,
        },
        {
          id: 2,
          hashtag: "Voluntariado",
          title: "Nuestros voluntarios",
          text: "Sumate al voluntariado y ayudanos a nutrir la región.",
          button: true,
          button_text: "Asociate como voluntario",
        },
      ],
    };
  },
};
</script>
