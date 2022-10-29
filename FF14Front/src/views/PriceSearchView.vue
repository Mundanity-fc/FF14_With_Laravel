<script>
export default {
  data() {
    return {}
  },

  methods: {
    search() {
      var item = this.$refs.ItemName.value;
      console.log(item);
      var count = this.$refs.Count.value;
      console.log(count);
      var server = this.$refs.ServerName.value;
      console.log(server);
      var search = 'http://127.0.0.1:8000/price/' + item + ',' + count + ',' + server;
      this.$router.push({
        path: '/priceInfo',
        query: {
          search: search
        }
      });
    }
  }
}
</script>

<template>
  <main>
    <div class="uk-card uk-card-secondary uk-card-body uk-card-large">
      <form class="uk-search uk-search-default">
        <input ref="ItemName" aria-label="Search" class="uk-search-input" placeholder="物品名称" type="search">
        <div class="uk-margin">
          <input ref="Count" aria-label="Range" class="uk-range" max="10" min="0" step="1" type="range" value="5">
        </div>
        <div class="uk-margin">
          <select ref="ServerName" aria-label="Select" class="uk-select">
            <option>中国</option>
            <option>陆行鸟</option>
            <option>莫古力</option>
            <option>猫小胖</option>
            <option>豆豆柴</option>
          </select>
        </div>
      </form>
      <button class="uk-button uk-button-default" @click="search">搜索</button>
    </div>

  </main>

</template>
