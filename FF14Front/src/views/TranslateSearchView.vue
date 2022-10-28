<script>
export default {
  data() {
    return {
      target : null
    }
  },
  created() {
    this.target = {
      id:'',
      name_cn:'',
      name_en:'',
      name_jp:''
    }
  },
  methods:{
    search(){
      var type=this.$refs.Type.value;
      var name=this.$refs.Name.value;
      var search = 'http://127.0.0.1:8000/translate/' + type + ',' + name;
      console.log(search)
      fetch(search)
          .then(res => res.json())
          .then(data => (this.target = data))
    }
  }
}
</script>

<template>
  <main>
    <div class="uk-card uk-card-secondary uk-card-body uk-card-large">
      <form class="uk-search uk-search-default">
        <div class="uk-margin">
          <select class="uk-select" aria-label="Select" ref="Type">
            <option>任务</option>
            <option>技能</option>
            <option>道具</option>
          </select>
        </div>
        <input class="uk-search-input" type="search" placeholder="对象名称" aria-label="Search" ref="Name">
      </form>
      <button class="uk-button uk-button-default" @click="search">搜索</button>
      <table class="uk-table uk-table-small uk-table-hover">
        <tbody>
        <tr>
          <td><b>ID</b></td>
          <td><b>中文</b></td>
          <td><b>英文</b></td>
          <td><b>日文</b></td>
        </tr>
        <tr>
          <td>{{ target.id }}</td>
          <td>{{ target.name_cn }}</td>
          <td>{{ target.name_en }}</td>
          <td>{{ target.name_jp }}</td>
        </tr>
        </tbody>
      </table>
    </div>

  </main>

</template>
