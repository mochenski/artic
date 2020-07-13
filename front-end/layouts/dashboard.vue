<template>
  <v-app>
    <v-navigation-drawer
      v-model="drawer"
      class="bg-gradient"
      expand-on-hover
      mini-variant
      dark
      permanent
      fixed
      app
    >
      <v-list dense nav rounded class="py-0">
        <v-list-item two-line class="px-0">
          <v-list-item-avatar>
            <img src="https://randomuser.me/api/portraits/men/81.jpg" />
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title>{{$auth.user.name}}</v-list-item-title>
            <v-list-item-subtitle v-if="$auth.user.admin == 1">Admin</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-divider class="py-2"></v-divider>

        <nuxt-link v-for="item in items" :key="item.title" :to="'/'+item.page">
          <v-list-item link>
            <v-list-item-icon>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </nuxt-link>
      </v-list>

      <template v-slot:append>
        <v-list dense nav rounded class="py-1">
          <v-divider class="py-1"></v-divider>
          <v-list-item @click="$auth.logout()" link>
            <v-list-item-icon>
              <v-icon>mdi-logout</v-icon>
            </v-list-item-icon>

            <v-list-item-content>
              <v-list-item-title>Logout</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list>
      </template>
    </v-navigation-drawer>
    <v-main class="bg-light">
      <nuxt />
    </v-main>
  </v-app>
</template>

<script>
export default {
  middleware: 'auth',
  data() {
    return {
      drawer: true,
      items: [
        { title: 'Dashboard', icon: 'mdi-view-dashboard', page: 'dashboard' },
        { title: 'My Articles', icon: 'mdi-image', page: 'dashboard/articles' }
      ],
      color: 'primary'
    }
  },

  methods: {
    async userLogout() {}
  }
}
</script>

<style>
.bg-dashboard {
  background: rgb(58, 180, 173);
  background: linear-gradient(
    117deg,
    rgba(58, 180, 173, 1) 0%,
    rgba(29, 253, 220, 0.9724264705882353) 50%,
    rgba(69, 137, 252, 1) 100%
  );
}

.bg-gradient-2 {
  background: rgb(58, 180, 173);
  background: linear-gradient(
    117deg,
    rgba(58, 180, 173, 1) 0%,
    rgba(29, 253, 220, 0.9724264705882353) 50%,
    rgba(69, 137, 252, 1) 100%
  );
}
</style>
