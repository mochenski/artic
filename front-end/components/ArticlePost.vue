<template>
  <v-card class="my-16 pa-10" shaped elevation="7">
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
    </v-list-item>

    <!-- <v-img src="https://cdn.vuetifyjs.com/images/cards/store.jpg"></v-img> -->

    <v-card-text class="text-justify">{{ articleBody }}</v-card-text>

    <v-card-actions>
      <v-btn v-for="tag in articleTags" :key="tag.id" color="orange" text>{{ tag.name }}</v-btn>
    </v-card-actions>
  </v-card>
</template>

<script>
export default {
  props: {
    articleSlug: String,
    articleAuthor: String,
    articleTitle: String,
    articleBody: String,
    articleTags: Array
  }
}
</script>

<style>
.color a {
  color: black;
}
</style>