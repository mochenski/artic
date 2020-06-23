<template>
  <v-app>
    <nuxt />
    <svg class="bg-gradient" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path
        fill="#fff"
        fill-opacity="1"
        d="M0,96L48,128C96,160,192,224,288,218.7C384,213,480,139,576,101.3C672,64,768,64,864,80C960,96,1056,128,1152,133.3C1248,139,1344,117,1392,106.7L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"
      />
    </svg>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      show: false
    }
  }
}
</script>

<style>
.bg-gradient {
  background: rgb(58, 180, 173);
  background: linear-gradient(
    117deg,
    rgba(58, 180, 173, 1) 0%,
    rgba(29, 253, 220, 0.9724264705882353) 50%,
    rgba(69, 137, 252, 1) 100%
  );
}
</style>
