<template>
  <v-container>
    <v-tabs-items v-model="tabs">
      <v-tab-item id="new">
        <article-post
          v-for="article in newArticles"
          :key="article.id"
          :articleTitle="article.title"
          :articleAuthor="article.author.name"
          :articleBody="article.body"
          :articleTags="article.tags"
        />
      </v-tab-item>
      <v-tab-item id="hot">
        <article-post
          v-for="article in hotArticles"
          :key="article.id"
          :articleTitle="article.title"
          :articleAuthor="article.author.name"
          :articleBody="article.body"
          :articleTags="article.tags"
        />
      </v-tab-item>
      <v-tab-item id="all">
        <article-post
          v-for="article in allArticles"
          :key="article.id"
          :articleTitle="article.title"
          :articleAuthor="article.author.name"
          :articleBody="article.body"
          :articleTags="article.tags"
        />
      </v-tab-item>
    </v-tabs-items>
  </v-container>
</template>

<script>
import { mapMutations } from 'vuex'
import ArticlePost from '@/components/ArticlePost'

export default {
  mounted() {
    this.loadNew()
    this.loadHot()
    this.loadAll()
  },
  layout: 'articles',
  components: {
    ArticlePost
  },
  data: () => ({
    newArticles: Object,
    hotArticles: Object,
    allArticles: Object
  }),
  computed: {
    tabs() {
      return this.$store.state.tabs.tab
    }
  },
  methods: {
    async loadAll() {
      this.$axios
        .get('/articles/all')
        .then((response) => {
          this.allArticles = response.data
        })
        .catch((err) => {
          console.log(err.response)
        })
    },

    async loadHot() {
      this.$axios
        .get('/articles/hot')
        .then((response) => {
          this.hotArticles = response.data
        })
        .catch((err) => {
          console.log(err.response)
        })
    },

    async loadNew() {
      this.$axios
        .get('/articles/new')
        .then((response) => {
          this.newArticles = response.data
        })
        .catch((err) => {
          console.log(err.response)
        })
    }
  }
}
</script>
