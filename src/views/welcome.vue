<!--
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-04-11 23:06:51
 * @LastEditTime: 2024-05-15 11:44:02
 * @Description: 欢迎界面
-->
<template>
  <div class="w-full h-full flex justify-center p-3">
    <Login v-if="!isLogin" @success="isLogin = true" />
    <News
      :user-info="{
        id: '1',
        username: 'yuri',
        isRoot: true,
      }"
      v-else
    />
  </div>
</template>
<script setup lang="ts">
import { ref } from 'vue';
import { Login } from '@/components/login/index';
import News from './news.vue';

const userInfo = ref({
  id: '1',
  username: 'yuri',
  isRoot: true,
});
const isLogin = ref(true);
</script>
