# 使用文档

## 依赖

- `php`: 8.3.7
- `npm`: 9.6.7

## 安装

### 安装php

1. 下载php的可执行文件: [下载地址](https://windows.php.net/downloads/releases/php-8.3.7-nts-Win32-vs16-x64.zip)

2. 解压到c盘根据路，并将文件夹命名成php(别问，问就是这样方便)

3. 将目录添加到系统path

4. 打开终端输入`php --version` 测试是否安装成功

   ```shell
   PHP 8.3.7 (cli) (built: May  8 2024 08:56:34) (NTS Visual C++ 2019 x64)
   Copyright (c) The PHP Group
   Zend Engine v4.3.7, Copyright (c) Zend Technologies
   ```

5. 打开vscode安装php插件，搜索php安装第一个插件就行

### 安装node

百度直接下载

### 安装mysql

百度直接下载

### 连接mysql

1. 添加mysqli插件

   1. 查看php目录有没有php.ini配置文件。如果没有则将`"C:\php\php.ini-development"`拷贝成`php.ini`
   2. 修改`php.ini`， 取消`extension=mysqli`前的注释

## 启动项目

### 初始化

> 该步骤只需要执行一次，用于初始化数据库

1. cd 进入`src/php/mysql`
2. 使用终端登录mysql -> `mysql -u用户名 -p密码`
3. `source ./sql.sql;` 执行sql文件

### 运行php后端

1. cd进入 `src/php`
2. 使用 `php -S localhost:8000` 启动php后端(如果端口已经被占用，可以更改端口号，更改完了需要去`.env`修改基础url)

### 运行前端

1. 进入项目根目录
2. `npm install`安装依赖
3. `npm run dev`启动项目

