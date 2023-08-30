# Polaris-Account
Polaris Account - Laravel commercial level out of the box SSO account system（北极星 - laravel 商业级开箱即用SSO账户系统）

目前实现的功能

1.完整的账户系统，支持编辑用户资料、更新密码、双重验证、浏览器会话管理、第三方账户绑定与管理、删除账户。

2.前后端分离，前端基于vue3 + Tailwind + inertia ，单次加载小于200ms，性能极速。

3.为 laravel Octane Swoole 构建，安装配置Octane Swoole解锁完整版性能。

4.使用 laravel Passport 实现基于Oauth的SSO系统，多业务系统自由授牌（含类似微信的授牌页）。

6.智能化的国际化支持，根据用户浏览器语言智能切换语言。

7.完整的后台管理，包含用户管理、权限管理、用户组管理、日志管理，以及注册用户、今日注册用户、未激活邮箱用户、日志的统计。

8.后台使用backpack，通过curd获取、编辑和管理数据。


安装步骤

1.解压文件，赋予755权限，nginx配置文件里写入include /hdd/www/wwwroot/域名/public/.nginx.conf;

2.运行 composer install

3.运行 npm install

4.运行 npm run build

5.编辑 env 文件，填写正确信息

6.运行 php artisan key:generate 生成key

7.运行 php artisan config:cache && php artisan view:clear && php artisan cache:clear && php artisan route:cache

8.运行 php artisan migrate:fresh --seed

配置passport（SSO）

1.运行 php artisan passport:install --uuids

2.运行 php artisan passport:keys

3.创建 passport 业务端key：运行 php artisan passport:client
