<script setup>
import {RouterLink, RouterView} from 'vue-router'
import HelloWorld from './components/HelloWorld.vue'</script>

<script>
export default {
  data() {
    return {}
  },

  created() {
  },

  methods: {}
}
</script>

<template>
  <header>
    <div class="wrapper">
      <HelloWorld v-if="this.$store.state.token === ''" msg="欢迎！"/>
      <HelloWorld v-if="this.$store.state.token !== ''" :msg="`欢迎您，`+this.$store.state.user.name"/>
      <nav>
        <RouterLink to="/">主页</RouterLink>
        <RouterLink to="/quest">任务</RouterLink>
        <RouterLink to="/price">价格</RouterLink>
        <RouterLink to="/translate">翻译</RouterLink>
        <RouterLink v-if="this.$store.state.token === ''" to="/login">登录</RouterLink>
        <RouterLink v-if="this.$store.state.token === ''" to="/register">注册</RouterLink>
        <RouterLink v-if="this.$store.state.token !== ''" to="/logout">登出</RouterLink>
      </nav>
    </div>
  </header>

  <RouterView/>
</template>

<style scoped>
header {
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
