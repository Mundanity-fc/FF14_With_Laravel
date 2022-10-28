<script>
export default {
  data() {
    return {
      Item: null
    }
  },

  created() {
    var search = this.$route.query.search
    console.log(search)
    fetch(search)
        .then(res => res.json())
        .then(data => (this.Item = data))
  }
}
</script>

<template>
  <main>
    <div class="uk-card uk-card-secondary uk-card-body uk-card-large">
      <table>
        <tr>
          <td><img :src="this.Item.icon" alt=""></td>
          <td><h3 class="uk-text-center">{{ this.Item.name_cn }}</h3></td>
        </tr>
      </table>
    </div>

  </main>

</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
