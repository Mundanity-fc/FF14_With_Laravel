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
  },
  methods:{
    printUnixTime(unix){
      var date = new Date(unix * 1000);
      var year = date.getFullYear();
      var month = date.getMonth();
      var day = date.getDate();
      var hour = date.getHours();
      var min = date.getMinutes();
      var sec = date.getSeconds();
      return year + '-' + month + '-' + day + ' ' + hour + ':' + min + ':' + sec
    }
  }
}
</script>

<template>
  <main>
    <div class="uk-card uk-card-secondary uk-card-body uk-card-large">
      <table>
        <tr>
          <td><span class="uk-badge">{{ this.Item.price_info.regionName }}</span></td>
          <td><img :src="this.Item.icon" alt=""></td>
          <td><h3 class="uk-text-center">{{ this.Item.name_cn }}</h3></td>
        </tr>
      </table>
      <hr />
      <table class="uk-table uk-table-hover uk-table-small uk-table-justify">
        <tr>
          <td><b>目前全体平均价格</b></td>
          <td><b>目前NQ平均价格</b></td>
          <td><b>目前HQ平均价格</b></td>
          <td><b>总体平均价格</b></td>
        </tr>
        <tr>
          <td>{{ this.Item.price_info.currentAveragePrice }}</td>
          <td>{{ this.Item.price_info.currentAveragePriceNQ }}</td>
          <td>{{ this.Item.price_info.currentAveragePriceHQ }}</td>
          <td>{{ this.Item.price_info.averagePrice }}</td>
        </tr>
        <tr>
          <td><b>最低价格</b></td>
          <td><b>最高价格</b></td>
          <td><b>总体NQ平均价格</b></td>
          <td><b>总体HQ平均价格</b></td>
        </tr>
        <tr>
          <td>{{ this.Item.price_info.minPrice }}</td>
          <td>{{ this.Item.price_info.maxPrice }}</td>
          <td>{{ this.Item.price_info.averagePriceNQ }}</td>
          <td>{{ this.Item.price_info.averagePriceHQ }}</td>
        </tr>
        <tr>
          <td><b>NQ最低价格</b></td>
          <td><b>HQ最低价格</b></td>
          <td><b>NQ最高价格</b></td>
          <td><b>HQ最高价格</b></td>
        </tr>
        <tr>
          <td>{{ this.Item.price_info.minPriceNQ }}</td>
          <td>{{ this.Item.price_info.minPriceHQ }}</td>
          <td>{{ this.Item.price_info.maxPriceNQ }}</td>
          <td>{{ this.Item.price_info.maxPriceHQ }}</td>
        </tr>
      </table>
      <hr />
      <h4 v-if="this.Item.price_info.listings !== null">待售列表</h4>
      <table v-if="this.Item.price_info.listings !== null" class="uk-table uk-table-hover uk-table-justify ">
        <tr>
          <td><b>单价</b></td>
          <td><b>数量</b></td>
          <td><b>总价</b></td>
          <td><b>所在服务器</b></td>
          <td><b>雇员名称</b></td>
          <td><b>HQ</b></td>
          <td><b>更新时间</b></td>
        </tr>
        <tr v-for="list in this.Item.price_info.listings">
          <td>{{ list.pricePerUnit }}</td>
          <td>{{ list.quantity }}</td>
          <td>{{ list.total }}</td>
          <td>{{ list.worldName }}</td>
          <td>{{ list.retainerName }}</td>
          <td v-if="list.hq === true">是</td>
          <td v-if="list.hq === false">否</td>
          <td>{{ printUnixTime(list.lastReviewTime) }}</td>
        </tr>
      </table>
      <h4 v-if="this.Item.price_info.recentHistory !== null">售出列表</h4>
      <table v-if="this.Item.price_info.recentHistory !== null" class="uk-table uk-table-hover uk-table-justify ">
        <tr>
          <td><b>单价</b></td>
          <td><b>数量</b></td>
          <td><b>总价</b></td>
          <td><b>所在服务器</b></td>
          <td><b>买家名称</b></td>
          <td><b>HQ</b></td>
          <td><b>售出时间</b></td>
        </tr>
        <tr v-for="list in this.Item.price_info.recentHistory">
          <td>{{ list.pricePerUnit }}</td>
          <td>{{ list.quantity }}</td>
          <td>{{ list.total }}</td>
          <td>{{ list.worldName }}</td>
          <td>{{ list.buyerName }}</td>
          <td v-if="list.hq === true">是</td>
          <td v-if="list.hq === false">否</td>
          <td>{{ printUnixTime(list.timestamp) }}</td>
        </tr>
      </table>
    </div>

  </main>

</template>

<style>
</style>
