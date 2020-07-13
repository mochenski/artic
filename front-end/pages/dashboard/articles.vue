<template>
  <v-container>
    <v-row>
      <v-card class="mx-auto" elevation="3" width="100%" :loading="loading">
        <v-card-title>Recent Articles</v-card-title>

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
          <v-card
            v-for="article in articles"
            :key="article.id"
            class="my-2"
            rounded
          >
            <v-row class="pa-1 pl-5">
              <v-col cols="1">{{ article.id }}</v-col>
              <v-col cols="3">{{ article.title }}</v-col>
              <v-col cols="2">{{
                $moment(article.updated_at).fromNow()
              }}</v-col>
              <v-col cols="2">{{
                article.publicated_at
                  ? article.publicated_at
                  : 'Not published yet'
              }}</v-col>
              <v-col>
                <v-btn color="green" dark>Publish</v-btn>
              </v-col>
              <v-col>
                <v-btn color="blue" dark>Update</v-btn>
              </v-col>
              <v-col>
                <v-btn color="red" dark>Delete</v-btn>
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
    loadArticles() {
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

    transformData() {
      return 'item.getData()'
    }
  }
}
</script>
