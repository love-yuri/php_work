/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2023-11-30 09:22:10
 * @LastEditTime: 2024-05-13 20:24:19
 * @Description: main ts
 */
import { createApp } from 'vue';
import ElementPlus from 'element-plus';
import 'element-plus/dist/index.css';
import App from './App.vue';
import router from './router';

const app = createApp(App);
import * as ElementPlusIconsVue from '@element-plus/icons-vue';

for (const [key, component] of Object.entries(ElementPlusIconsVue)) {
  app.component(key, component);
}

app.use(ElementPlus);
app.use(router);
app.mount('#app');

// console.log(import.meta.env.VITE_ENV_TEST);
