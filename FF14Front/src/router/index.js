import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/quest',
      name: 'quest',
      component: () => import('../views/QuestSearchView.vue')
    },
    {
      path: '/questByID',
      name: 'questByID',
      component: () => import('../views/QuestByIDView.vue')
    },
    {
      path: '/questByName',
      name: 'questByName',
      component: () => import('../views/QuestByNameView.vue')
    },
    {
      path: '/price',
      name: 'price',
      component: () => import('../views/PriceSearchView.vue')
    },
    {
      path: '/translate',
      name: 'translate',
      component: () => import('../views/TranslateSearchView.vue')
    }
  ]
})

export default router
