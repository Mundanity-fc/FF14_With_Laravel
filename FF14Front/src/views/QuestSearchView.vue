<script>
import Main from '../App.vue'
export default {
  data() {
    return {
    }
  },

  methods:{
    searchByID(){
      var id=this.$refs.SearchByID.value;
      this.$router.push({
        path: '/questByID',
        query: {
          id: id
        }
      });
    },
    serachByName(){
      var name=this.$refs.SearchByName.value;
      this.$router.push({
        path: '/questByName',
        query: {
          name: name
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
        <input class="uk-search-input" type="search" placeholder="任务ID" aria-label="Search" ref="SearchByID">
      </form>
      <button class="uk-button uk-button-default" @click="searchByID">按ID搜索</button>
      <form class="uk-search uk-search-default">
        <input class="uk-search-input" type="search" placeholder="任务名称" aria-label="Search" ref="SearchByName">
      </form>
      <button class="uk-button uk-button-default" @click="serachByName">按名称搜索</button>
    </div>

    <div class="uk-card uk-card-secondary uk-card-body uk-card-large" v-if="this.user === null">
      <form class="uk-search uk-search-default">
        <input class="uk-search-input" type="search" placeholder="任务ID" aria-label="Search" ref="SearchByID">
      </form>
      <button class="uk-button uk-button-default" @click="searchByID">按ID搜索</button>
      <form class="uk-search uk-search-default">
        <input class="uk-search-input" type="search" placeholder="任务名称" aria-label="Search" ref="SearchByName">
      </form>
      <button class="uk-button uk-button-default" @click="serachByName">按名称搜索</button>
    </div>
  </main>

</template>
