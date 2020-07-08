<template>
  <v-container>
    <v-tabs-items v-model="tabs">
      <v-tab-item id="new">
        <article-post></article-post>
      </v-tab-item>
      <v-tab-item id="hot">
        <article-post></article-post>
      </v-tab-item>
      <v-tab-item id="all">
        <article-post
          v-for="article in articles"
          :key="article.id"
          :articleTitle="article.title"
          :articleAuthor="article.author.name"
          :articleBody="article.body"
          :articleTags="article.tags"
        ></article-post>
      </v-tab-item>
    </v-tabs-items>
  </v-container>
</template>

<script>
import { mapMutations } from 'vuex'
import ArticlePost from '@/components/ArticlePost'

export default {
  mounted() {
    this.loadHot()
  },
  layout: 'articles',
  components: {
    ArticlePost
  },
  data: () => ({
    articles: Object
  }),
  computed: {
    tabs() {
      return this.$store.state.tabs.tab
    }
  },
  methods: {
    async loadHot() {
      this.$axios
        .get('/articles')
        .then((response) => {
          this.articles = response.data
        })
        .catch((err) => {
          console.log(err.response)
        })
    }
  }
}
</script>
