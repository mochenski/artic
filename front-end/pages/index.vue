<template>
  <div>
    <p>{{ dados }}</p>
    <button @click="callAPI">Teste chama API</button>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  asyncData(context) {
    return context.app.$axios.get('teste').then((res) => ({
      dados: res.data ? res.data : 'Backend não retornou nenhum dado'
    }))
  },

  mounted() {
    axios.get('/api/teste').then((response) => alert(response.data))
  },

  methods: {
    callAPI() {
      this.$nuxt.$loading.start()
      this.$axios
        .get('teste')
        .then((response) => {
          this.dados = response.data
        })
        .catch((response) => {
          this.dados = response
        })
        .finally(() => {
          this.$nuxt.$loading.finish()
        })
    }
  }
}
</script>
