Pigly

環境構築
Dockerビルド
　1.cd coachtech/laravel
  2.git clone git@github.com:Estra-Coachtech/laravel-docker-template.git
  3.cd confirmation-test3
  4.DockerDesktopアプリを立ち上げる

Laravel環境構築
 1.docker-compose exec php bash
 2.composer install
 3.「.env.example」ファイルを 「.env」ファイルに命名を変更。または、新しく.envファイルを作成
 4.envに以下の環境変数を追加
  DB_CONNECTION=mysql
  DB_HOST=mysql
  DB_PORT=3306
  DB_DATABASE=laravel_db
  DB_USERNAME=laravel_user
  DB_PASSWORD=laravel_pass

  5.アプリケーションキーの作成
  php artisan key:generate

  6.マイグレーションの実行
  php artisan migrate

  7.シーディングの実行
  php artisan db:seed

  使用技術(実行環境)
　・PHP8.3.0
　・Laravel8.83.27
　・MySQL8.0.26

ER図
<img width="1920" height="1080" alt="スクリーンショット 2025-09-14 191403" src="https://github.com/user-attachments/assets/3b44dfcc-15db-44bc-804a-aba27e193271" />

URL
　・開発環境：http://localhost/
  ・phpMyAdmin:：http://localhost:8080/

ダミーデータ
・ログイン　メールアドレス：test@example.com
           パスワード：password
  
