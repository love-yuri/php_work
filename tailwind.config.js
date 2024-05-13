/*
 * @Author: love-yuri yuri2078170658@gmail.com
 * @Date: 2023-11-05 20:42:03
 * @LastEditTime: 2024-04-11 22:36:42
 * @Description: tailwindcss配置文件
 */
/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: ['./index.html', './src/**/*.{vue,js,ts}'],
  theme: {
    extend: {
      zIndex: {
        '-1': '-1',
      },
    },
  },
};
