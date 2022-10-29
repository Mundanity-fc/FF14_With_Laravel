<script>

export default {
  data() {
    return {
      error:false,
      msg:null,
      success:false
    }
  },

  methods:{
    postRegister(){
      var n=this.$refs.name.value;
      var e=this.$refs.email.value;
      var p=this.$refs.password.value;
      var c=this.$refs.ckps.value;
      const params = new URLSearchParams();
      params.append('name', n);
      params.append('email', e);
      params.append('password', p);
      params.append('password_confirmation', c);
      this.$store.state.axios.post('http://127.0.0.1:8000/api/register',params)
          .then(response => {
            let data = response.data
            if (data === '成功注册'){
              this.success = true
            }else{
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
    <div class="uk-card uk-card-secondary uk-card-body uk-card-large" v-if="this.success === false">
      <table v-if="this.error">
        <tr v-if="this.msg.name">
          <td><span class="uk-text-danger">用户名错误</span></td>
          <td class="uk-text-warning">{{this.msg.name[0]}}</td>
        </tr>
        <tr v-if="this.msg.email">
          <td><span class="uk-text-danger">邮箱地址错误</span></td>
          <td class="uk-text-warning">{{this.msg.email[0]}}</td>
        </tr>
        <tr v-if="this.msg.password">
          <td><span class="uk-text-danger">密码错误</span></td>
          <td class="uk-text-warning">{{this.msg.password[0]}}</td>
        </tr>
      </table>
      <form>
        <fieldset class="uk-fieldset">

          <legend class="uk-legend">注册</legend>

          <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="用户名" aria-label="Input" ref="name">
          </div>

          <div class="uk-margin">
            <input class="uk-input" type="text" placeholder="邮箱地址" aria-label="Input" ref="email">
          </div>

          <div class="uk-margin">
            <input class="uk-input" type="password" placeholder="密码" aria-label="Input" ref="password">
          </div>

          <div class="uk-margin">
            <input class="uk-input" type="password" placeholder="密码确认" aria-label="Input" ref="ckps">
          </div>

        </fieldset>
      </form>
      <hr />
      <button class="uk-button uk-button-default" @click="postRegister">Submit</button>
    </div>

    <div class="uk-card uk-card-secondary uk-card-body uk-card-large" v-if="this.success === true">
      <h3>注册成功，请从左侧菜单选择登录</h3>
    </div>
  </main>

</template>
