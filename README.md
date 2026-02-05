# images_post_app

phpコンテナに入る
起動したプログラムの中の一つ、PHPを使う部分にアクセスします。

docker exec -it myapp-php bash
laravelをインストール
PHPを使って、Laravelというツールをセットアップ（インストール）します。

composer create-project --prefer-dist laravel/laravel my-app
phpコンテナから出る
Laravelのセットアップが終わったら、PHPの部分を終了します。

exit
docker-compose.ymlを編集する
設定ファイル（docker-compose.yml）を変更して、プロジェクトの設定を更新します。以下のようにvolumesセクションを編集してください。

  web: 
 
    volumes:
    - - .:/var/www/
    + - ./my-app:/var/www/

  nginx: 
 
    volumes:
    - - .:/var/www/
    + - ./my-app:/var/www/
 
再度docker composeで立ち上げる
更新した設定で、もう一度プログラムを起動します。

docker compose up -d
