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

## デプロイ
Container-Optimized-OSがインストールされたGCEインスタンスにデプロイします。  
`public/.env.production`開き、DBホストなどを適宜変更してください。  また、下記コマンドにおけるContainer RegistryのURLも適宜変更してください。  
さらに、イメージ名の重複などから下記コマンド通りにイメージ名が命名されない可能性があるので`docker images`で確認してください。

```
$ cd docker
$ docker-compose build
$ docker tag docker_apache asia.gcr.io/kc3-winter-team11/team11-server
$ yes | docker image prune
$ docker push asia.gcr.io/kc3-winter-team11/team11-server
```
1. 上記コマンドを実行
1. GCPコンソールを開き、GCEのVMインスタンスからセットアップしたインスタンスを選択
1. ページ上部のリセットボタンからVMインスタンスをリセットする
1. しばらくするとVMの起動及びDockerイメージのpullとrunが行われ、IPアドレスにアクセス可能となる
 
