<script>
export default {
  data() {
    return {
    }
  },

  methods:{
    search(){
      var item=this.$refs.ItemName.value;
      console.log(item);
      var count=this.$refs.Count.value;
      console.log(count);
      var server=this.$refs.ServerName.value;
      console.log(server);
      // this.$router.push({
      //   path: '/questByID',
      //   query: {
      //     id: id
      //   }
      // });
    }
  }
}
</script>

<template>
  <main>
    <div class="uk-card uk-card-secondary uk-card-body uk-card-large">
      <form class="uk-search uk-search-default">
        <input class="uk-search-input" type="search" placeholder="物品名称" aria-label="Search" ref="ItemName">
        <div class="uk-margin">
          <input class="uk-range" type="range" value="5" min="0" max="10" step="1" aria-label="Range" ref="Count">
        </div>
        <div class="uk-margin">
          <select class="uk-select" aria-label="Select" ref="ServerName">
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
