<template>
  <v-container class="fill-height">
    <v-row justify="center">
      <v-col cols="12">
        <v-row>
          <div class="text-h1">Welcome {{$auth.user.name}}</div>
        </v-row>
        <v-row>
          <div class="text-h4">This is your dashboard</div>
        </v-row>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  layout: 'dashboard'
}
</script>

