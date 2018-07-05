## 项目介绍
提供time trace app 接口
采用jwt进行身份验证

## 项目进度
- [x] 根据日期与用户id获取trace data 返回前端
- [x] 标记 trace
- [ ] 根据userid获取周统计数据
- [ ] 根据userid获取月统计数据

## 项目安装
### 环境要求
    参见laravel5 LTS安装要求
### 安装步骤
- composer install 如果报错 composer update
- 生成密钥 你只需要在你的 shell 中运行如下命令即可：
        $ php artisan jwt:secret 此命令会在你的 .env 文件中新增一行 JWT_SECRET=secret

### jwt相关参考url
https://laravel-china.org/articles/7264/using-jwt-auth-to-implement-api-user-authentication-and-painless-refresh-access-token
### laravel跨域解决方案参考url
https://laravel-china.org/articles/6504/laravel-cross-domain-solution


