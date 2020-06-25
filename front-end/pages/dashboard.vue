<template>
  <v-container fill-height fluid>
    <v-row align="center" justify="center">
      <h1>Welcome {{ $auth.user.name }}</h1>
    </v-row>
  </v-container>
</template>

<script>
export default {
  layout: 'dashboard'
}
</script>
