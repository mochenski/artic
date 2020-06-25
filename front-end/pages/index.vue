<template>
  <div
    class="d-inline-flex flex-column my-auto align-center justify-space-around"
  >
    <h1>Welcome to Landing page</h1>
    <div class="pa-10">
      <v-btn v-if="$auth.loggedIn" @click="$auth.logout()">Logout</v-btn>
      <nuxt-link to="/login" v-else>
        <v-btn>Login</v-btn>
      </nuxt-link>
    </div>
  </div>
</template>

<script>
import Clients from '../components/passport/Clients'
export default {
  components: {
    Clients
  }
}
</script>
