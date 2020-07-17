<template>
  <v-card class="my-16 rounded-xl" width="100%" elevation="5">
    <v-list-item>
      <v-list-item-avatar color="grey">
        <img src="https://randomuser.me/api/portraits/men/81.jpg" />
      </v-list-item-avatar>
      <v-list-item-content class="color">
        <nuxt-link :to="'/articles/'+articleSlug">
          <v-list-item-title class="headline">{{ articleTitle }}</v-list-item-title>
        </nuxt-link>
        <v-list-item-subtitle>by {{ articleAuthor }}</v-list-item-subtitle>
      </v-list-item-content>
      <v-list-item-action>
        <v-list-item-action-text>Published at {{ $moment(articleDate).format('DD/MM/YYYY') }}</v-list-item-action-text>
      </v-list-item-action>
    </v-list-item>

    <v-img v-if="articleImg" src="https://cdn.vuetifyjs.com/images/cards/store.jpg"></v-img>

    <v-card-text class="text-justify pa-10">{{ articleText }}</v-card-text>

    <v-card-actions class="px-10">
      <v-btn v-for="tag in articleTags" :key="tag.id" color="orange" text>
        <nuxt-link :to="'/tags/'+tag.name">{{ tag.name }}</nuxt-link>
      </v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  props: {
    articleSlug: String,
    articleAuthor: String,
    articleTitle: String,
    articleText: String,
    articleTags: Array,
    articleDate: String,
    articleImg: {
      type: Boolean,
      default: true
    }
  }
}
</script>

<style>
.color a {
  color: black;
}
</style>