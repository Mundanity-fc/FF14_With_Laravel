<script>

export default {
  data() {
    return {}
  },

  methods: {
    postLogin() {
      console.log(this.$store);
      var res;
      var e = this.$refs.email.value;
      var p = this.$refs.password.value;
      const params = new URLSearchParams();
      params.append('email', e);
      params.append('password', p);
      this.$store.state.axios.post('http://127.0.0.1:8000/api/login', params)
          .then(response => {
            let data = response.data
            if (data !== '错误') {
              console.log(data)
              this.$store.commit('setToken', data.token);
              this.$store.commit('setUser', data.user);
              console.log(this.$store.state)
              this.$router.push({
                path: '/'
              });
            }
          });
    }

  }
}
</script>

<template>
  <main>
    <div class="uk-card uk-card-secondary uk-card-body uk-card-large">
      <form>
        <fieldset class="uk-fieldset">

          <legend class="uk-legend">登录</legend>

          <div class="uk-margin">
            <input ref="email" aria-label="Input" class="uk-input" placeholder="邮箱地址" type="text">
          </div>

          <div class="uk-margin">
            <input ref="password" aria-label="Input" class="uk-input" placeholder="密码" type="password">
          </div>


        </fieldset>
      </form>
      <hr/>
      <button class="uk-button uk-button-default" @click="postLogin">Submit</button>
    </div>

  </main>

</template>
