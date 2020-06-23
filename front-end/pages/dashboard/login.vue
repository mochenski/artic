<template>
  <div class="d-inline-flex my-auto align-center justify-space-around">
    <div>
      <h1>Welcome to Dashboard</h1>
      <div class="pa-10">
        <nuxt-link to="/">
          <v-btn>Back to Landing Page</v-btn>
        </nuxt-link>
      </div>
    </div>
    <v-card shaped>
      <div class="ma-10">
        <v-card-title class="p-0">Login</v-card-title>
        <v-text-field label="Email"></v-text-field>
        <v-text-field
          :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
          :type="show ? 'text' : 'password'"
          label="Password"
          class="input-group--focused"
          @click:append="show = !show"
        ></v-text-field>
        <nuxt-link to="/dashboard">
          <v-btn color="primary" rounded outlined>Login</v-btn>
        </nuxt-link>
      </div>
    </v-card>
  </div>
</template>

<script>
export default {
  layout: 'dashboardLogin'
}
</script>
