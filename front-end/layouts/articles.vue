<template>
  <v-app>
    <v-app-bar class="bg-dashboard" flat app>
      <v-toolbar-title class="text-uppercase">Artic</v-toolbar-title>
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
      <v-tabs centered grow>
        <v-tab>New</v-tab>
        <v-tab>Hot</v-tab>
        <v-tab>All time</v-tab>
      </v-tabs>
      <v-content>
        <nuxt />
      </v-content>
    </v-main>
  </v-app>
</template>

<style>
.bg-dashboard {
  background: rgb(58, 180, 173);
  background: linear-gradient(
    117deg,
    rgba(58, 180, 173, 1) 0%,
    rgba(29, 253, 220, 0.9724264705882353) 50%,
    rgba(69, 137, 252, 1) 100%
  );
}
</style>