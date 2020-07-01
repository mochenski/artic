<template>
  <div>
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
export default {
  layout: 'articles'
}
</script>
