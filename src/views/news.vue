<template>
  <el-scrollbar class="w-full">
    <div class="text-[30px] my-3 flex flex-row justify-center items-center">
      <span class="mx-2">新闻发布中心</span>
      <el-tooltip v-if="userInfo.root == 1" class="box-item" effect="dark" content="添加新闻" placement="bottom">
        <el-icon class="cursor-pointer border-2 border-gray-500" @click="addNews" color="gray"><Plus /></el-icon>
      </el-tooltip>
      <el-tooltip v-if="userInfo.id != -1" class="box-item" effect="dark" content="退出登录" placement="bottom">
        <el-icon class="mx-2 cursor-pointer" color="gray" @click="logOut"><Tools /></el-icon>
      </el-tooltip>
      <a class="text-[23px] cursor-pointer" v-if="userInfo.id == -1" @click="$emit('login')">登录</a>
    </div>
    <div class="flex justify-center">
      <div class="w-[70%] flex flex-row items-center">
        <el-input v-model="searchText" placeholder="请输入内容..." />
        <Search color="green" class="h-8 w-8 ml-3 cursor-pointer" @click="search" />
      </div>
    </div>

    <template v-for="item in news" :key="item.title">
      <el-card class="my-4" :header="item.title">
        <p class="text-right w-full text-[10px]">{{ item.date }}</p>
        <p>{{ item.content }}</p>
        <div class="flex flex-row items-center my-6" v-if="userInfo.id != -1">
          <el-avatar class="mx-2" :src="avatarPng" />
          <el-input :rows="1" placeholder="请输入内容" v-model="item.commentText" />
          <el-button type="primary" class="mx-2" @click="commentNews(item)">评论</el-button>
        </div>
        <div
          v-for="kk in item.comments.filter((k) => k.status == 1 || userInfo.root == 1)"
          :key="kk.id"
          class="my-1 flex flex-row items-center"
        >
          <el-avatar class="mx-2" :src="avatarPng" />
          <div class="flex flex-col flex-1">
            <span class="text-[12px] text-gray-400">{{ kk.username }} {{ kk.date }}</span>
            <span>{{ kk.content }}</span>
          </div>
          <el-button type="danger" v-if="userInfo.root == 1" class="mx-2" @click="delComment(kk)">删除</el-button>
          <el-button type="primary" v-if="kk.status == 0" class="mx-2" @click="passComment(kk)">审核通过</el-button>
        </div>
        <template #footer>
          <el-button type="primary" @click="editNews(item)" v-if="userInfo.root == 1">编辑</el-button>
          <el-button type="danger" @click="delNews(item.id)" v-if="userInfo.root == 1">删除</el-button>
        </template>
      </el-card>
    </template>
    <div class="flex w-full justify-center fixed bottom-3">
      <el-pagination layout="prev, pager, next" @current-change="currentChange" :page-size="pageSize" :total="total" class="my-4" />
    </div>
  </el-scrollbar>
  <el-dialog v-model="showEdit" :title="`${isCreate ? '发布' : '编辑'}新闻`" width="500">
    <div>
      <el-form label-position="top" :model="currentNews">
        <el-form-item label="标题">
          <el-input v-model="currentNews.title" placeholder="请输入标题..." />
        </el-form-item>
        <el-form-item label="内容">
          <el-input type="textarea" :rows="4" v-model="currentNews.content" placeholder="请输入内容..." />
        </el-form-item>
      </el-form>
    </div>
    <template #footer>
      <div class="dialog-footer">
        <el-button @click="showEdit = false">取消</el-button>
        <el-button type="primary" @click="updateNews"> {{ `${isCreate ? '发布' : '编辑'}新闻` }} </el-button>
      </div>
    </template>
  </el-dialog>
</template>

<script lang="ts" setup>
import { onMounted, ref } from 'vue';
import { list, comment, update, create, deleteNews, searchNews } from '@/api/news';
import { update as updateComment, deleteComment } from '@/api/comment';
import avatarPng from '@/assets/avatar.png';
import { ElMessage } from 'element-plus';

const emits = defineEmits(['logOut', 'login']);
const props = defineProps<{
  userInfo: {
    id: number;
    username: string;
    root: number;
  };
}>();

interface News {
  id: string;
  title: string;
  content: string;
  date: string;
  commentText?: string;
  comments: {
    id: string;
    content: string;
    date: string;
    username: string;
    status: number;
  }[];
}

const isCreate = ref(false);
const showEdit = ref(false);
const searchText = ref('');
const total = ref(0);
const pageSize = ref(3);
const current = ref(1);
const currentNews = ref<News>({
  id: '',
  title: '',
  content: '',
  date: '',
  comments: [],
});
const news = ref<News[]>([]);

async function loadData() {
  const res = await list({
    current: current.value,
    size: pageSize.value,
  });
  news.value = res.news;
  total.value = res.total;
}

onMounted(() => {
  loadData();
});

async function commentNews(item: News) {
  await comment({
    news_id: item.id,
    content: item.commentText,
    user_id: props.userInfo.id,
  });
  if (props.userInfo.root == 1) {
    ElMessage.success('评论成功');
  } else {
    ElMessage.success('评论成功，等待审核');
  }
  item.commentText = '';
  loadData();
}

async function updateNews() {
  const fun = isCreate.value ? create : update;
  await fun(currentNews.value);
  ElMessage.success(`${isCreate.value ? '发布' : '编辑'}成功`);
  showEdit.value = false;
  loadData();
}

async function passComment(item: any) {
  await updateComment(item);
  item.status = 1;
  ElMessage.success('审核通过');
}

async function delComment(item: any) {
  await deleteComment(item);
  ElMessage.success('删除成功');
  loadData();
}

async function editNews(item: News) {
  currentNews.value.title = item.title;
  currentNews.value.content = item.content;
  currentNews.value.id = item.id;
  isCreate.value = false;
  showEdit.value = true;
}

async function addNews() {
  currentNews.value.title = '';
  currentNews.value.content = '';
  isCreate.value = true;
  showEdit.value = true;
}

async function delNews(id: string) {
  await deleteNews({
    id: id,
  });
  ElMessage.success('删除成功');
  loadData();
}

async function search() {
  const res = await searchNews({
    current: current.value,
    size: pageSize.value,
    content: searchText.value,
  });
  news.value = res.news;
  total.value = res.total;
}

async function currentChange(val: number) {
  current.value = val;
  loadData();
}

function logOut() {
  localStorage.removeItem('userInfo_php');
  emits('logOut');
}
</script>

<style>
.el-table .warning-row {
  --el-table-tr-bg-color: var(--el-color-warning-light-9);
}
.el-table .success-row {
  --el-table-tr-bg-color: var(--el-color-success-light-9);
}

.example-pagination-block + .example-pagination-block {
  margin-top: 10px;
}
.example-pagination-block .example-demonstration {
  margin-bottom: 16px;
}
</style>
