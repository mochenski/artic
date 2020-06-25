<template>
  <v-app>
    <v-navigation-drawer
      v-model="drawer"
      class="bg-gradient"
      :expand-on-hover="expandOnHover"
      :mini-variant="miniVariant"
      absolute
      app
      dark
    >
      <v-list dense nav rounded class="py-0">
        <v-list-item two-line :class="miniVariant && 'px-0'">
          <v-list-item-avatar>
            <img src="https://randomuser.me/api/portraits/men/81.jpg" />
          </v-list-item-avatar>

          <v-list-item-content>
            <v-list-item-title>Jon Doe</v-list-item-title>
            <v-list-item-subtitle>Admin</v-list-item-subtitle>
          </v-list-item-content>
        </v-list-item>

        <v-divider class="py-1"></v-divider>

        <v-list-item v-for="item in items" :key="item.title" link>
          <v-list-item-icon>
            <v-icon>{{ item.icon }}</v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ item.title }}</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
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
    <v-content>
      <nuxt />
    </v-content>
  </v-app>
</template>

<script>
export default {
  data() {
    return {
      drawer: true,
      items: [
        { title: 'Dashboard', icon: 'mdi-view-dashboard' },
        { title: 'Photos', icon: 'mdi-image' },
        { title: 'About', icon: 'mdi-help-box' }
      ],
      color: 'primary',
      miniVariant: true,
      expandOnHover: true
    }
  },

  methods: {
    async userLogout() {}
  }
}
</script>

<style>
.bg-dashboard {
  padding: 48px;
}

.bg-gradient-2 {
  margin-top: -300px;
  background: rgb(58, 180, 173);
  background: linear-gradient(
    117deg,
    rgba(58, 180, 173, 1) 0%,
    rgba(29, 253, 220, 0.9724264705882353) 50%,
    rgba(69, 137, 252, 1) 100%
  );
}
</style>
