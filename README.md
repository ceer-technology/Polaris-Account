# Polaris-Account
Polaris Account - Laravel commercial level out of the box SSO account system（北极星 - laravel 商业级开箱即用SSO账户系统）

demo:[polaris.indieclub.net](https://polaris.indieclub.net/)

演示账户

'name' => 'Admin',（用户名）

'email' => 'account@polaris-account.net',（邮箱）

'password' => 'PolarisAccount',（密码）

![19daed7f848b90841012b9cb409dd485](https://github.com/ceer-technology/Polaris-Account/assets/33198997/eac57b84-6757-4ba4-bfb6-da002b969b8b)

![8eb2314d686b800097fcf56a500ee8cc](https://github.com/ceer-technology/Polaris-Account/assets/33198997/a9dd9e3f-c45b-4800-b13a-6683f73b2bd4)

![6428e59e61c0bc1359637802acab5603](https://github.com/ceer-technology/Polaris-Account/assets/33198997/cf155680-4d9d-4a99-9476-a9e77b977689)

![53bef189953268522b57ee30df20b078](https://github.com/ceer-technology/Polaris-Account/assets/33198997/7084fec7-635f-47a6-92d3-bb8af62d5a9e)

![be9a176ab61bb8abacd70e9e579f0d19](https://github.com/ceer-technology/Polaris-Account/assets/33198997/db3952d1-c171-4584-bffd-db20de70d3e3)


目前实现的功能

1.完整的账户系统，支持编辑用户资料、更新密码、双重验证、浏览器会话管理、第三方账户绑定与管理、删除账户。

2.前后端分离，前端基于vue3 + Tailwind + inertia ，单次加载小于200ms，性能极速。

3.为 laravel Octane Swoole 构建，安装配置Octane Swoole解锁完整版性能。

4.使用 laravel Passport 实现基于Oauth的SSO系统，多业务系统自由授牌（含类似微信的授牌页）。

5.支持 pwa

6.智能化的国际化支持，根据用户浏览器语言智能切换语言。

7.完整的后台管理，包含用户管理、权限管理、用户组管理、日志管理，以及注册用户、今日注册用户、未激活邮箱用户、日志的统计。

8.后台使用backpack，通过curd获取、编辑和管理数据。


安装步骤

1.解压文件，赋予755权限

2.nginx配置文件里写入include /域名/public/.nginx.conf;

3.设置 /public 为执行目录

4.运行 composer install （安装composer包，非官方源有几率安装失败。）

5.运行 npm install （安装node，安装完成后使用 node -v 查看node版本，确保node版本为18.x）

6.运行 npm run build （编译前端）

7.编辑 env 文件，填写正确信息（SESSION_DOMAIN务必正确填写确保数据加密正常，格式参考SESSION_DOMAIN=polaris.indieclub.net）

8.运行 php artisan key:generate 生成key

9.运行 php artisan config:cache && php artisan view:clear && php artisan cache:clear && php artisan route:cache

10.运行 php artisan migrate:fresh --seed

配置passport（SSO）

1.运行 php artisan passport:install --uuids

2.运行 php artisan passport:keys

3.创建 passport 业务端key：运行 php artisan passport:client

关于默认创建超级管理员账户信息

'name' => 'Admin',（用户名）

'email' => 'account@polaris-account.net',（邮箱）

'password' => 'PolarisAccount',（密码）

'role' => 'superAdmin',（权限组）
