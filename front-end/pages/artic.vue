<template>
  <v-container fluid>
    <v-row>
      <v-col>
        <v-container>
          <v-tabs-items class="no-bg" v-model="tabs">
            <v-tab-item id="new">
              <article-post
                v-for="article in newArticles"
                :key="article.id"
                :articleTitle="article.title"
                :articleSlug="article.slug"
                :articleAuthor="article.author.name"
                :articleText="article.excerpt"
                :articleTags="article.tags"
                :articleDate="article.publicated_at"
              />
            </v-tab-item>
            <v-tab-item id="hot">
              <article-post
                v-for="article in hotArticles"
                :key="article.id"
                :articleTitle="article.title"
                :articleSlug="article.slug"
                :articleAuthor="article.author.name"
                :articleText="article.excerpt"
                :articleTags="article.tags"
                :articleDate="article.publicated_at"
              />
            </v-tab-item>
            <v-tab-item id="all">
              <article-post
                v-for="article in allArticles"
                :key="article.id"
                :articleTitle="article.title"
                :articleSlug="article.slug"
                :articleAuthor="article.author.name"
                :articleText="article.excerpt"
                :articleTags="article.tags"
                :articleDate="article.publicated_at"
              />
            </v-tab-item>
          </v-tabs-items>
        </v-container>
      </v-col>
      <v-col cols="4">
        <v-container>
          <v-card class="mt-16 rounded-xl">
            <v-card-title>Trending</v-card-title>
          </v-card>

          <article-post
            v-for="article in hotArticles"
            :key="article.id"
            :articleTitle="article.title"
            :articleSlug="article.slug"
            :articleImg="false"
            :articleAuthor="article.author.name"
            :articleText="article.excerpt"
            :articleTags="article.tags"
            :articleDate="article.publicated_at"
          />
        </v-container>
      </v-col>
    </v-row>
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

<style>
.no-bg {
  background-color: rgba(0, 0, 0, 0) !important;
}
</style>