# team11-server

## システム仕様
### アプリケーション
| Name | Version |
|:-----------:|:------------:|
| Laravel | 5.5 |
### ミドルウェア
| Name | Version |
|:-----------:|:------------:|
| Apache | 2.4 |
| MySQL | 5.7 |
| phpMyAdmin | 4.8 |

## 開発環境
### 概要
開発にはコンテナ環境を利用します。  
以下のアプリケーションをインストールしてください。
- Docker
- Docker Compose
### セットアップ
```
$ git clone https://github.com/winter-kc3/team11-server.git
$ cd team11-server/docker
$ cp .env.default .env
$ docker-compose up -d
$ docker-compose exec apache /bin/bash
$ php artisan migrate
$ php artisan db:seed --class=DatabaseSeeder
```
