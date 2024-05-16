<!--
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-04-11 23:06:51
 * @LastEditTime: 2024-05-16 09:11:29
 * @Description: 欢迎界面
-->
<template>
  <div class="w-full h-full flex justify-center p-3">
    <Login v-if="!isLogin" @success="login" />
    <News :user-info="userInfo" v-else />
  </div>
</template>
<script setup lang="ts">
import { ref } from 'vue';
import { Login } from '@/components/login/index';
import News from './news.vue';

const userInfo = ref();
const isLogin = ref(false);

function login(params: any) {
  isLogin.value = true;
  userInfo.value = params;
}
</script>
