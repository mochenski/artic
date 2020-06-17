<template>
  <div>
    <nav-bar></nav-bar>
    <nav class="nav-menu d-flex flex-column justify-content-center">
      <ul>
        <li @mouseenter="show" @mouseleave="hide" ref="link">
          <nuxt-link to="/">
            <i class="bx bx-home"></i>
            <span>Home</span>
          </nuxt-link>
        </li>
        <li @mouseenter="displaySpan = true" @mouseleave="displaySpan = false">
          <nuxt-link to="/">
            <i class="bx bx-user"></i>
            <transition>
              <span v-if="displaySpan">About</span>
            </transition>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/">
            <i class="bx bx-bar-chart"></i>
            <span>Skills</span>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/">
            <i class="bx bx-file-blank"></i>
            <span>Resume</span>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/">
            <i class="bx bx-envelope"></i>
            <span>Contact</span>
          </nuxt-link>
        </li>
      </ul>
    </nav>
    <nuxt />
  </div>
</template>

<script>
import NavBar from '@/components/NavBar'
export default {
  components: {
    NavBar
  },
  data() {
    return {
      displaySpan: false,
      fullWidth: 0
    }
  },

  methods: {
    show(event) {
      const normalWidth = this.$refs.link.children[0].clientWidth
      console.log(normalWidth)
      this.fullWidth = this.$refs.link.children[0].clientWidth
      // this.$refs.link.children[0].style.width = 'normalWidth'
      this.$refs.link.children[0].children[1].style.display = 'block'
      // this.$refs.link.children[0].style.width = 'fullWidth
    },

    hide(event) {
      this.$refs.link.children[0].children[1].style.display = 'none'
      // this.displaySpan = false
    }
  }
}
</script>

<style>
.nav-menu {
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  z-index: 99;
  font-size: 20px;
  padding: 15px;
}

.nav-menu span {
  position: inherit;
  transition: 0.3s;
  transition-property: width;
}

.nav-menu li {
  position: relative;
  list-style: none;
}

.nav-menu a {
  display: inline-flex;
  flex-direction: row;
  align-items: center;
  text-decoration: none;
  padding: 20px;
  margin-bottom: 5px;
  border-radius: 50rem !important;
  background-color: whitesmoke;
  color: #0563bb;
  overflow: hidden;
  /* width: 0 */
  transition-property: width;
  transition: 0.3s;
}

.nav-menu a:hover {
  transition-property: width;
  background-color: #0563bb;
  color: whitesmoke;
  /* width: 200px; */
}
</style>
