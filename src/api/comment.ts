import { ResponseType, baseApi } from '@/api/baseApi';

export const update = (params: any) => {
  return baseApi({
    method: ResponseType.POST,
    url: '/api/comment_update.php',
    params: params,
  });
};

export const deleteComment = (params: any) => {
  return baseApi({
    method: ResponseType.POST,
    url: '/api/comment_delete.php',
    params: params,
  });
};
