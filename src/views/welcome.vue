<!--
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-04-11 23:06:51
 * @LastEditTime: 2024-06-04 14:11:14
 * @Description: 欢迎界面
-->
<template>
  <div class="w-full h-full flex justify-center p-3">
    <Login v-if="!isLogin" @success="login" />
    <News :user-info="userInfo" @log-out="isLogin = false" @login="isLogin = false" v-else />
  </div>
</template>
<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { Login } from '@/components/login/index';
import News from './news.vue';

const userInfo = ref({
  id: -1,
  username: '',
  root: 0,
});

const isLogin = ref(true);

function login(params: any) {
  isLogin.value = true;
  userInfo.value = params;
  localStorage.setItem('userInfo_php', JSON.stringify(params));
}

onMounted(() => {
  const userInfo_php = localStorage.getItem('userInfo_php');
  if (userInfo_php) {
    userInfo.value = JSON.parse(userInfo_php);
    isLogin.value = true;
  }
});
</script>
