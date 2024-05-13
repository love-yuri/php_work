/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2024-05-13 22:02:42
 * @LastEditTime: 2024-05-13 22:15:08
 * @Description: 用户接口
 */
import { ResponseType, baseApi } from '@/api/baseApi';

export const login = (params: any) => {
  return baseApi({
    method: ResponseType.POST,
    url: '/user/login.php',
    params: params,
  });
};
