export const state = () => ({
  tab: null
})

export const mutations = {
  change(state, text) {
    state.tab = text
  }
}
