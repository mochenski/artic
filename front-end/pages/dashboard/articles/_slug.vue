<template>
  <v-container>
    <v-row>
      <v-card class="mx-auto" elevation="3" width="100%" :loading="loading">
        <v-card-title>Editing article - {{article.title}}</v-card-title>

        <v-container class="pa-5">
          <v-divider class="mb-10"></v-divider>

          <v-form>
            <v-text-field outlined rounded label="Title" v-model="article.title"></v-text-field>
            <v-text-field outlined rounded label="Slug" v-model="article.slug"></v-text-field>
            <v-textarea auto-grow outlined rounded label="Excerpt" v-model="article.excerpt"></v-textarea>
            <v-textarea auto-grow outlined rounded label="Body" v-model="article.body"></v-textarea>

            <v-row class="pa-5">
              <v-btn color="red" @click="loadArticle" dark>Reset</v-btn>
              <v-spacer></v-spacer>
              <v-btn color="blue" @click="submitArticle" dark>Submit Changes</v-btn>
            </v-row>
          </v-form>
        </v-container>
      </v-card>
    </v-row>
  </v-container>
</template>

<script>
export default {
  layout: 'dashboard',

  data: () => ({
    article: Object,
    loading: false
  }),

  mounted() {
    this.loadArticle()
  },

  computed: {
    params() {
      return this.$route.params
    }
  },

  methods: {
    async loadArticle() {
      this.loading = true
      await this.$axios
        .get(`articles/${this.params.slug}`)
        .then((response) => {
          this.article = response.data
          this.loading = false
        })
        .catch((err) => {
          console.log(err.response)
          this.loading = false
        })
    },

    async submitArticle() {
      this.loading = true
      await this.$axios
        .put(`articles/${this.params.slug}`, this.article)
        .then((response) => {
          console.log(response)
          this.loading = false
          this.$router.push('/dashboard/articles')
        })
        .catch((err) => {
          console.log(err.response)
          this.loading = false
        })
    }
  }
}
</script>
