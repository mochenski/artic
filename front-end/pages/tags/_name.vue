<template>
  <v-container>
    <v-row>
      <article-post
        v-for="article in articles"
        :key="article.id"
        :articleTitle="article.title"
        :articleSlug="article.slug"
        :articleAuthor="article.author.name"
        :articleText="article.excerpt"
        :articleTags="article.tags"
        :articleDate="article.publicated_at"
      />
    </v-row>
  </v-container>
</template>

<script>
import ArticlePost from '@/components/ArticlePost'

export default {
  layout: 'article',
  components: {
    ArticlePost
  },

  mounted() {
    this.loadArticles()
  },

  data: () => ({
    loading: false,
    articles: {}
  }),

  computed: {
    params() {
      return this.$route.params
    }
  },

  methods: {
    async loadArticles() {
      this.loading = true
      await this.$axios
        .get(`tags/${this.params.name}`)
        .then((response) => {
          console.log(response.data)
          this.articles = response.data
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
