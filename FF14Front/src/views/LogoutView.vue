<script>
export default {
  data() {
    return {}
  },
  created() {
    this.$store.commit('delToken');
    this.$router.push({
      path: '/'
    });
  },
  methods: {}
}
</script>

<template>
  <main>
    <div class="uk-card uk-card-secondary uk-card-body uk-card-large">
      <h3>您已退出</h3>
    </div>

  </main>

</template>
