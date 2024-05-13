/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-13 20:24:56
 * @LastEditTime: 2024-05-13 20:38:01
 * @Description: 路由配置
 */
import { createRouter, createWebHashHistory } from 'vue-router';
// import { ElNotification } from 'element-plus';

const router = createRouter({
  history: createWebHashHistory(),
  routes: [
    {
      path: '/',
      component: () => import('./views/welcome.vue'),
    },
  ],
});

// 全局路由守卫
router.beforeEach((to, from, next) => {
  next();
});

export default router;
