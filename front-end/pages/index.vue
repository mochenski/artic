<template>
  <div
    class="d-inline-flex flex-column my-auto align-center justify-space-around"
  >
    <h1>Welcome to Landing page</h1>
    <div class="pa-10">
      <nuxt-link to="dashboard/login">
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
