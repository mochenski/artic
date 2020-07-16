<template>
  <v-app>
    <v-app-bar class="cyan accent-3" flat app>
      <nuxt-link to="/">
        <v-toolbar-title class="text-uppercase">Artic</v-toolbar-title>
      </nuxt-link>

      <v-spacer></v-spacer>
      <v-container>
        <v-tabs background-color="cyan accent-3" v-model="tab" centered dark>
          <v-tab href="#new">New</v-tab>
          <v-tab href="#hot">Hot</v-tab>
          <v-tab href="#all">All time</v-tab>
          <!-- Call computed ations -->
          {{ changeTab }}
        </v-tabs>
      </v-container>
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
      <v-main>
        <nuxt />
      </v-main>
    </v-main>
  </v-app>
</template>

<script>
import { mapMutations } from 'vuex'
export default {
  data: () => ({
    tab: null
  }),
  computed: {
    changeTab: function() {
      return this.$store.commit('tabs/change', this.tab)
    }
  }
}
</script>