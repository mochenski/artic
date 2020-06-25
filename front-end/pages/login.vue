<template>
  <div class="d-inline-flex my-auto mt-10 align-center justify-space-around">
    <div>
      <h1>Welcome to Dashboard</h1>
      <div class="pa-10">
        <nuxt-link to="/">
          <v-btn>Back to Landing Page</v-btn>
        </nuxt-link>
      </div>
    </div>

    <v-card
      v-click-outside="onClickOutside"
      @click="active = true"
      :color="active ? 'cyan accent-3' : 'undefined'"
      :dark="active"
      shaped
    >
      <div class="ma-10">
        <v-card-title class="p-0">Login</v-card-title>
        <v-text-field v-if="signup" label="Name" v-model="name" />
        <v-text-field label="Email" v-model="login.email" />
        <v-text-field
          :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
          :type="show ? 'text' : 'password'"
          label="Password"
          v-model="login.password"
          class="input-group--focused"
          @click:append="show = !show"
        />
        <v-btn
          :color="active ? 'undefined' : 'cyan accent-3'"
          @click="!signup ? userLogin() : (signup = false)"
          rounded
          outlined
          >Login</v-btn
        >
        <v-btn
          :color="active ? 'undefined' : 'cyan accent-3'"
          @click="signup ? userRegister() : (signup = true)"
          rounded
          outlined
          >SignUp</v-btn
        >
      </div>
    </v-card>
    <v-alert v-show="dados" type="error">{{ dados }}</v-alert>
  </div>
</template>

<script>
export default {
  layout: 'dashboardLogin',
  data: () => ({
    active: false,
    show: false,
    signup: false,
    name: 'name',
    login: {
      email: 'email@email.com',
      password: 'password'
    },
    dados: ''
  }),

  methods: {
    async userLogin() {
      this.$nuxt.$loading.start()
      this.$auth
        .loginWith('local', {
          data: this.login
        })
        .then(() => {
          this.$nuxt.$loading.finish()
          this.$router.push('/dashboard')
        })
        .catch((err) => {
          this.$nuxt.$loading.finish()
        })
    },

    async userRegister() {
      this.$nuxt.$loading.start()
      this.$axios
        .post('/register', {
          name: this.name,
          email: this.login.email,
          password: this.login.password
        })
        .then(() => {
          this.$nuxt.$loading.finish()
          this.$auth
            .loginWith('local', {
              data: this.login
            })
            .then(() => {
              this.$router.push('/dashboard')
            })
        })
        .catch((err) => {
          thid.$nuxt.$loading.finish()
          console.log(err.response)
        })
    },

    onClickOutside() {
      this.active = false
    }
  }
}
</script>
