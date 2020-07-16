<template>
  <v-container fill-height>
    <div>
      <h1>Welcome to Dashboard</h1>
      <div class="pa-10">
        <nuxt-link to="/">
          <v-btn color="cyan accent-3" rounded outlined>Back to Landing Page</v-btn>
        </nuxt-link>
      </div>
    </div>
    <v-spacer></v-spacer>
    <v-card
      v-click-outside="onClickOutside"
      @click="active = true"
      :color="(errorMessage) ? 'red lighten-4' : 'white'"
      shaped
    >
      <div class="ma-10">
        <v-card-title class="p-0">Login</v-card-title>
        <v-text-field v-if="signup" :error-messages="errorLabels.name" label="Name" v-model="name" />
        <v-text-field label="Email" :error-messages="errorLabels.email" v-model="login.email" />
        <v-text-field
          :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
          :type="show ? 'text' : 'password'"
          label="Password"
          :error-messages="errorLabels.password"
          v-model="login.password"
          class="input-group--focused"
          @click:append="show = !show"
        />
        <v-btn
          :color="errorMessage ? 'white' : 'cyan accent-3'"
          @click="!signup ? userLogin() : (signup = false, errorLabels = '', snackbar = false)"
          rounded
          outlined
        >Login</v-btn>
        <v-btn
          :color="errorMessage ? 'white' : 'cyan accent-3'"
          @click="signup ? userRegister() : (signup = true)"
          rounded
          outlined
        >SignUp</v-btn>
      </div>
    </v-card>
    <v-snackbar color="red" v-model="snackbar" :timeout="timeout">
      <v-row align="center" class="px-5">
        <div>{{ error }}</div>
        <v-spacer class="px-5"></v-spacer>
        <v-btn color="red" @click="snackbar = false">CLOSE</v-btn>
      </v-row>
    </v-snackbar>
  </v-container>
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
    snackbar: false,
    timeout: -1,
    dados: '',
    errorMessage: '',
    errorLabels: {
      name: [],
      email: [],
      password: []
    }
  }),

  computed: {
    error() {
      if (this.snackbar) return this.errorMessage
      else this.errorMessage = ''
      return
    }
  },

  methods: {
    async userLogin() {
      this.$nuxt.$loading.start()
      this.$auth
        .loginWith('local', {
          data: this.login
        })
        .then(() => {
          this.$nuxt.$loading.finish()
          this.$router.push('/artic')
        })
        .catch((err) => {
          this.snackbarShow(err.response.data.message)
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
              this.$router.push('/artic')
            })
        })
        .catch((err) => {
          this.$nuxt.$loading.finish()
          this.errorLabels = err.response.data.error
          this.snackbarShow(err.response.data.message)
          console.log(err.response)
        })
    },

    snackbarShow(message) {
      this.timeout = 10000
      this.snackbar = true
      this.errorMessage = message
    },

    onClickOutside() {
      this.active = false
    }
  }
}
</script>

<style></style>
