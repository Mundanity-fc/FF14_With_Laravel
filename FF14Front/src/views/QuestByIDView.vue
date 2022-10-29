<script>
export default {
  data() {
    return {
      QuestInfo: null
    }
  },

  created() {
    var id = this.$route.query.id
    var search = 'http://127.0.0.1:8000/quest/' + id
    console.log(search)
    fetch(search)
        .then(res => res.json())
        .then(data => (this.QuestInfo = data))
  }
}
</script>

<template>
  <main>
    <div class="uk-card uk-card-secondary uk-card-body uk-card-large">
      <div class="uk-width-auto">
        <img class="uk-comment-avatar" :src="QuestInfo.icon" width="80" height="80">
      </div>
      <div class="uk-width-expand">
        <h3 class="uk-card-title">{{ QuestInfo.name_cn }}</h3>
        <img class="uk-comment-avatar" :src="QuestInfo.banner" alt="无背景图">
        <table class="uk-table uk-table-small uk-table-hover">
          <tbody>
          <tr>
            <td><b>主分类</b></td>
            <td><b>子分类</b></td>
            <td><b>职业</b></td>
          </tr>
          <tr>
            <td>{{ QuestInfo.genre.name_cn }}</td>
            <td>{{ QuestInfo.category.name_cn }}</td>
            <td>{{ QuestInfo.job.name_cn }}</td>
          </tr>
          </tbody>
          <tbody>
          <tr>
            <td><b>开始地点</b></td>
            <td><b>开始NPC</b></td>
            <td><b>结束NPC</b></td>
          </tr>
          <tr>
            <td>{{ QuestInfo.start_place.name_cn }}</td>
            <td>{{ QuestInfo.start_npc.name_cn }}</td>
            <td>{{ QuestInfo.end_npc.name_cn }}</td>
          </tr>
          </tbody>
          <tbody>
          <tr>
            <td><b>金币报酬</b></td>
            <td></td>
            <td><b>经验报酬</b></td>
          </tr>
          <tr>
            <td>{{ QuestInfo.gil_reward }}</td>
            <td></td>
            <td>{{ QuestInfo.exp_reward }}</td>
          </tr>
          </tbody>
        </table>
        <table v-if="QuestInfo.item_reward.length !== 0">
          <thead>
          <tr>
            <th><b>固定奖励</b></th>
          </tr>
          </thead>
          <tr v-for="item in QuestInfo.item_reward">
            <td><img :src="item.icon" width="50" height="50" alt=""></td>
            <td>{{item.count}}x {{item.name_cn}}</td>
          </tr>
        </table>
        <table v-if="QuestInfo.option_reward.length !== 0">
          <thead>
          <tr>
            <th><b>可选奖励</b></th>
          </tr>
          </thead>
          <tr v-for="item in QuestInfo.option_reward">
            <td><img :src="item.icon" width="50" height="50" alt=""></td>
            <td>{{item.count}}x {{item.name_cn}}</td>
          </tr>
        </table>
        <table v-if="QuestInfo.action_reward !== ''">
          <thead>
          <tr>
            <th><b>技能奖励</b></th>
          </tr>
          </thead>
          <tr>
            <td><img :src="QuestInfo.action_reward.icon" width="50" height="50" alt=""></td>
            <td>{{QuestInfo.action_reward.name_cn}}</td>
          </tr>
        </table>
      </div>
    </div>
  </main>
</template>

<style>
</style>
