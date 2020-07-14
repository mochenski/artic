<template>
  <v-container>
    <v-row>
      <v-card class="mx-auto" elevation="3" width="100%" :loading="loading">
        <v-container>
          <v-row class="px-7">
            <v-card-title>Recent Articles</v-card-title>
            <v-spacer></v-spacer>
            <nuxt-link to="articles/create">
              <v-btn color="accent-3 cyan" dark>
                <v-icon>mdi-plus</v-icon>New Article
              </v-btn>
            </nuxt-link>
          </v-row>
        </v-container>

        <v-container>
          <v-row class="pa-1 pl-5">
            <v-col cols="1">Id</v-col>
            <v-col cols="3">Name</v-col>
            <v-col cols="2">Last Update at</v-col>
            <v-col cols="2">Published at</v-col>
            <v-col cols class="text-center">Publish</v-col>
            <v-col cols class="text-center">Update</v-col>
            <v-col cols class="text-center">Delete</v-col>
          </v-row>
          <v-divider class="my-4"></v-divider>
          <v-card v-for="article in articles" :key="article.id" class="my-2" rounded>
            <v-row class="pa-1 pl-5">
              <v-col cols="1">{{ article.id }}</v-col>
              <v-col cols="3">{{ article.title }}</v-col>
              <v-col cols="2">
                {{
                $moment(article.updated_at).fromNow()
                }}
              </v-col>
              <v-col cols="2">
                {{
                article.publicated_at
                ? $moment(article.publicated_at).fromNow()
                : 'Not published yet'
                }}
              </v-col>
              <v-col>
                <v-btn
                  color="green"
                  @click="publishArticle(article,article.slug)"
                  :disabled="false"
                  dark
                >Publish</v-btn>
              </v-col>
              <v-col>
                <nuxt-link :to="'articles/'+article.slug">
                  <v-btn color="blue" dark>Update</v-btn>
                </nuxt-link>
              </v-col>
              <v-col>
                <v-btn color="red" @click="deleteArticle(article.slug)" dark>Delete</v-btn>
              </v-col>
            </v-row>
          </v-card>
        </v-container>
      </v-card>
    </v-row>
  </v-container>
</template>

<script>
export default {
  layout: 'dashboard',

  mounted() {
    this.loadArticles()
  },

  data: () => ({
    loading: false,
    articles: Object
  }),

  methods: {
    async loadArticles() {
      this.loading = true
      this.$axios
        .get('user/articles')
        .then((response) => {
          console.log(response.data)
          this.articles = response.data.articles
          this.loading = false
        })
        .catch((err) => {
          console.log(err.response)
          this.loading = false
        })
    },

    async publishArticle(article, slug) {
      this.loading = true
      article.publicated_at = this.$moment().format()
      console.log(article)
      await this.$axios
        .put(`articles/${slug}`, article)
        .then((response) => {
          console.log(response)
          this.loading = false
          this.loadArticles()
        })
        .catch((err) => {
          console.log(err.response)
          this.loadArticles()
          this.loading = false
        })
    },

    async deleteArticle(slug) {
      this.loading = true
      await this.$axios
        .delete(`articles/${slug}`)
        .then((response) => {
          console.log(response)
          this.loading = false
          this.loadArticles()
        })
        .catch((err) => {
          console.log(err.response)
          this.loading = false
        })
    },

    transformData() {
      return 'item.getData()'
    }
  }
}
</script>
