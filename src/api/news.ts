/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-15 10:33:14
 * @LastEditTime: 2024-05-15 23:02:22
 * @Description: 新闻
 */
import { ResponseType, baseApi } from '@/api/baseApi';

export const list = (params: any) => {
  return baseApi({
    method: ResponseType.POST,
    url: '/api/news_list.php',
    params: params,
  });
};

export const comment = (params: any) => {
  return baseApi({
    method: ResponseType.POST,
    url: '/api/comment.php',
    params: params,
  });
};

export const update = (params: any) => {
  return baseApi({
    method: ResponseType.POST,
    url: '/api/news_update.php',
    params: params,
  });
};

export const create = (params: any) => {
  return baseApi({
    method: ResponseType.POST,
    url: '/api/news_create.php',
    params: params,
  });
};

export const deleteNews = (params: any) => {
  return baseApi({
    method: ResponseType.POST,
    url: '/api/news_delete.php',
    params: params,
  });
};

export const searchNews = (params: any) => {
  return baseApi({
    method: ResponseType.POST,
    url: '/api/news_search.php',
    params: params,
  });
};
