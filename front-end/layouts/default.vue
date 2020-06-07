<template>
  <div>
    <nav-bar></nav-bar>
    <nav class="nav-menu d-flex flex-column justify-content-center">
      <ul>
        <li @mouseover="displaySpan = true">
          <nuxt-link to="/">
            <i class="bx bx-home"></i>
            <span v-if="displaySpan">Home</span>
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/">
            <i class="bx bx-user"></i>
            <!-- <span>About</span> -->
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/">
            <i class="bx bx-bar-chart"></i>
            <!-- <span>Skills</span> -->
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/">
            <i class="bx bx-file-blank"></i>
            <!-- <span>Resume</span> -->
          </nuxt-link>
        </li>
        <li>
          <nuxt-link to="/">
            <i class="bx bx-envelope"></i>
            <!-- <span>Contact</span> -->
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
      displaySpan: false
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
  overflow-y: auto;
}

.nav-menu li {
  list-style: none;
  overflow: auto;
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
  transition: 1000ms;
  overflow-y: auto;
}

.nav-menu a:hover {
  background-color: #0563bb;
  color: whitesmoke;
  transition: 1000ms;
}
</style>
