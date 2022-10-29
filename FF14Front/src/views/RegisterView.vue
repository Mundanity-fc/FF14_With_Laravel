<script>

export default {
  data() {
    return {
      error: false,
      msg: null,
      success: false
    }
  },

  methods: {
    postRegister() {
      var n = this.$refs.name.value;
      var e = this.$refs.email.value;
      var p = this.$refs.password.value;
      var c = this.$refs.ckps.value;
      const params = new URLSearchParams();
      params.append('name', n);
      params.append('email', e);
      params.append('password', p);
      params.append('password_confirmation', c);
      this.$store.state.axios.post('http://127.0.0.1:8000/api/register', params)
          .then(response => {
            let data = response.data
            if (data === '成功注册') {
              this.success = true
            } else {
              this.error = true
              this.msg = data
              console.log(data)
            }
          });
    }

  }
}
</script>

<template>
  <main>
    <div v-if="this.success === false" class="uk-card uk-card-secondary uk-card-body uk-card-large">
      <table v-if="this.error">
        <tr v-if="this.msg.name">
          <td><span class="uk-text-danger">用户名错误</span></td>
          <td class="uk-text-warning">{{ this.msg.name[0] }}</td>
        </tr>
        <tr v-if="this.msg.email">
          <td><span class="uk-text-danger">邮箱地址错误</span></td>
          <td class="uk-text-warning">{{ this.msg.email[0] }}</td>
        </tr>
        <tr v-if="this.msg.password">
          <td><span class="uk-text-danger">密码错误</span></td>
          <td class="uk-text-warning">{{ this.msg.password[0] }}</td>
        </tr>
      </table>
      <form>
        <fieldset class="uk-fieldset">

          <legend class="uk-legend">注册</legend>

          <div class="uk-margin">
            <input ref="name" aria-label="Input" class="uk-input" placeholder="用户名" type="text">
          </div>

          <div class="uk-margin">
            <input ref="email" aria-label="Input" class="uk-input" placeholder="邮箱地址" type="text">
          </div>

          <div class="uk-margin">
            <input ref="password" aria-label="Input" class="uk-input" placeholder="密码" type="password">
          </div>

          <div class="uk-margin">
            <input ref="ckps" aria-label="Input" class="uk-input" placeholder="密码确认" type="password">
          </div>

        </fieldset>
      </form>
      <hr/>
      <button class="uk-button uk-button-default" @click="postRegister">Submit</button>
    </div>

    <div v-if="this.success === true" class="uk-card uk-card-secondary uk-card-body uk-card-large">
      <h3>注册成功，请从左侧菜单选择登录</h3>
    </div>
  </main>

</template>
