<template>
  <v-container>
    <v-row>
      <v-card class="mx-auto" elevation="3" width="100%" :loading="loading">
        <v-card-title>Creating article - {{newArticle.title}}</v-card-title>

        <v-container class="pa-5">
          <v-divider class="mb-10"></v-divider>

          <v-form>
            <v-text-field outlined rounded label="Title" v-model="newArticle.title"></v-text-field>
            <v-text-field outlined rounded label="Slug" v-model="newArticle.slug"></v-text-field>
            <v-textarea auto-grow outlined rounded label="Excerpt" v-model="newArticle.excerpt"></v-textarea>
            <v-textarea auto-grow outlined rounded label="Body" v-model="newArticle.body"></v-textarea>

            <v-select
              outlined
              rounded
              label="Tags"
              v-model="newArticle.tags"
              item-value="id"
              item-text="name"
              :items="tags"
              chips
              multiple
            ></v-select>
            <v-row class="pa-5">
              <v-btn color="blue" @click="createArticle" dark>Submit Changes</v-btn>
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
  mounted() {
    this.loadTags()
  },
  data: () => ({
    newArticle: {
      title: '',
      slug: '',
      excerpt: '',
      body: '',
      tags: []
    },
    tags: [],
    loading: false
  }),

  methods: {
    async createArticle() {
      this.loading = true
      await this.$axios
        .post(`articles`, this.newArticle)
        .then((response) => {
          console.log(response)
          this.loading = false
          this.$router.push('/dashboard/articles')
        })
        .catch((err) => {
          console.log(err.response)
          alert('Oh no')
          this.loading = false
        })
    },

    async loadTags() {
      console.log('a')
      this.loading = true
      await this.$axios
        .get('tags')
        .then((response) => {
          this.tags = response.data.map((tag) => ({
            id: tag.id,
            name: tag.name
          }))
          this.loading = false
        })
        .catch((err) => {
          console.log(err.response)
          this.loading = false
        })
    }
  }
}
</script>