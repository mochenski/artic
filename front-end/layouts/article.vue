<template>
  <v-app>
    <v-app-bar class="cyan accent-3 color" flat app>
      <nuxt-link to="/">
        <v-toolbar-title class="text-uppercase">Artic</v-toolbar-title>
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
      <v-content>
        <nuxt />
      </v-content>
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
</style>