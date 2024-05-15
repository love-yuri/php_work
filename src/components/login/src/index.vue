<!--
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-15 08:10:51
 * @LastEditTime: 2024-05-15 10:33:05
 * @Description: 登录界面
-->
<template>
  <el-form label-position="top" :model="baseUser">
    <el-form-item label="账号">
      <el-input v-model="baseUser.username" placeholder="请输入账号..." />
    </el-form-item>
    <el-form-item label="密码">
      <el-input v-model="baseUser.password" placeholder="请输入密码..." />
    </el-form-item>
    <el-form-item>
      <div class="flex justify-between w-full">
        <el-button type="primary" @click="onSubmit">登录</el-button>
        <el-button type="primary" @click="onSubmit">登录</el-button>
      </div>
    </el-form-item>
  </el-form>
</template>

<script lang="ts" setup>
import { reactive } from 'vue';
import { login } from '@/api/user';
import { ElMessage } from 'element-plus';

const emits = defineEmits(['success']);

const baseUser = reactive({
  username: '',
  password: '',
});

const onSubmit = async () => {
  await login(baseUser);
  emits('success');
  ElMessage.success('登录成功');
};
</script>
