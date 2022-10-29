import {createApp} from 'vue'
import {createStore} from 'vuex'
import axios from "axios";
import App from './App.vue'
import router from './router'
import './assets/main.css'

const store = createStore({
    state() {
        return {
            axios: axios,
            token: "",
            user: null
        }
    },
    getters: {
        getToken(state) {
            return state.token || localStorage.getItem("token") || "";
        }
    },
    mutations: {
        setToken(state, token) {
            state.token = token;
            localStorage.setItem('token', token);
            console.log('保存');
        },
        delToken(state) {
            state.token = "";
            localStorage.removeItem('token');
        },
        setUser(state, user) {
            state.user = user;
        }
    },
    actions: {}
})

const app = createApp(App)


app.use(router)
app.use(store)
app.mount('#app')
