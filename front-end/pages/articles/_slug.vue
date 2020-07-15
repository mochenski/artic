<template>
  <v-container>
    <v-row>
      <article-post
        :articleTitle="article.title"
        :articleSlug="article.slug"
        :articleAuthor="article.author.name"
        :articleBody="article.body"
        :articleTags="article.tags"
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
    this.loadArticle()
  },

  data: () => ({
    loading: false,
    article: {
      author: {} // defined author because :artucleAuthor won't accept undefined
    },
    tags: []
  }),

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
          console.log(response.data)
          this.article = response.data
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
