<template>
  <v-container fluid class="ma-0 pa-0 fill-height">
    <v-row class="ma-0 pa-0 fill-height">
      <v-col align="center" cols="12" class="absolute-img">
        <v-container class="fill-height">
          <v-row justify="center" align="center">
            <v-col>
              <img src="/logo.png" alt="Artic Logo" />
              <p class="text-h3 pa-10 subtitle">The perfect place for your article.</p>
              <div>
                <nuxt-link to="/login">
                  <v-btn rounded elevation="11">Login</v-btn>
                </nuxt-link>
                <span class="or px-10">OR</span>
                <nuxt-link to="/artic">
                  <v-btn rounded elevation="11">Join as a guest</v-btn>
                </nuxt-link>
              </div>
            </v-col>
          </v-row>
        </v-container>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  layout: 'welcome'
}
</script>

<style>
.absolute-img {
  background: url('/mountain_pixel.png') no-repeat center center;
}

.subtitle {
  background: -webkit-linear-gradient(
    117deg,
    rgb(20, 243, 232) 0%,
    rgba(8, 47, 98, 0.972) 50%,
    rgb(10, 233, 253) 100%
  );
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.or {
  color: aliceblue;
}
</style>