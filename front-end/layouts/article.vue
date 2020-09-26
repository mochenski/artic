<template>
  <v-app>
    <v-app-bar class="white color" app>
      <nuxt-link to="/artic">
        <v-img src="/logo.png" width="13%"></v-img>
      </nuxt-link>

      <v-spacer></v-spacer>

      <div v-if="$auth.loggedIn">
        <v-btn @click="$auth.logout()">Logout</v-btn>
        <nuxt-link to="/dashboard">
          <v-btn>Dashboard</v-btn>
        </nuxt-link>
      </div>
      <nuxt-link to="/login" v-else>
        <v-btn>Login</v-btn>
      </nuxt-link>
    </v-app-bar>
    <v-main>
      <v-main class="absolute-img-3">
        <nuxt />
      </v-main>
    </v-main>
  </v-app>
</template>

<script>
export default {
  data: () => ({})
}
</script>

<style>
.color a {
  color: black;
}

.absolute-img-3 {
  background: url('/mountain_pixel_opacity.png') repeat fixed center;
}
</style>