/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-04-11 21:24:37
 * @LastEditTime: 2024-04-11 22:45:37
 * @Description: vite config
 */
import { fileURLToPath, URL } from 'node:url';

import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url)),
    },
  },
  base: './' /* 设置打包根路径 */,
  build: {
    chunkSizeWarningLimit: 10000, // 设置新的警告阈值，单位为字节
  },
});
