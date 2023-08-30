# Polaris-Account
Polaris Account - Laravel commercial level out of the box SSO account system（北极星 - laravel 商业级开箱即用SSO账户系统）

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
