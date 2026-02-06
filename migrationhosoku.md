# Laravel Docker環境でのDB接続設定まとめ

## 問題
`php artisan migrate:status` 実行時に以下のエラーが発生：
```
SQLSTATE[HY000] [1049] Unknown database 'development'
```

## 原因
1. `.env` ファイルの `DB_HOST` がコンテナ名（`myapp-mariadb`）になっていた
2. データベース `development` が作成されていなかった

## 解決手順

### 1. DB_HOSTの修正

**Docker Composeではサービス名がホスト名になる**

```bash
# PHPコンテナに入る
docker exec -it myapp-php bash
cd /var/www

# DB_HOSTを修正
sed -i 's/DB_HOST=myapp-mariadb/DB_HOST=mariadb/' .env

# 確認
grep DB_HOST .env
# 出力: DB_HOST=mariadb

# 設定キャッシュをクリア
php artisan config:clear
```

### 2. データベースの作成

```bash
# ローカル（Mac）で実行
docker exec -it myapp-mariadb mariadb -u mysql -pmysql
```

MariaDB内で実行：
```sql
CREATE DATABASE IF NOT EXISTS development;
exit;
```

### 3. マイグレーション実行

```bash
# PHPコンテナに入る
docker exec -it myapp-php bash
cd /var/www

# マイグレーション実行
php artisan migrate
```

## 最終的な設定

### .env ファイル
```env
DB_CONNECTION=mysql
DB_HOST=mariadb          # ← サービス名を指定
DB_PORT=3306
DB_DATABASE=development
DB_USERNAME=mysql
DB_PASSWORD=mysql
```

### docker-compose.yml
```yaml
services:
  mariadb:              # ← このサービス名がホスト名になる
    container_name: myapp-mariadb
    image: mariadb
    environment:
      MYSQL_DATABASE: development
      MYSQL_USER: mysql
      MYSQL_PASSWORD: mysql
      MYSQL_ROOT_PASSWORD: root
      TZ: Asia/Tokyo
```

## 重要なポイント

1. **DB_HOST = Docker Composeのサービス名**
   - ❌ `myapp-mariadb` （コンテナ名）
   - ✅ `mariadb` （サービス名）

2. **環境変数の管理**
   - LaravelアプリのDB設定 → `.env`
   - MariaDBコンテナの設定 → `docker-compose.yml`

3. **コンテナ内での作業**
   - PHPコマンド（artisan, composer等） → PHPコンテナ内
   - データベース操作 → MariaDBコンテナ内

## トラブルシューティング

### 接続テスト
```bash
# PHPコンテナ内で
mysql -h mariadb -u mysql -pmysql -e "SHOW DATABASES;"
```

### 設定の確認
```bash
# PHPコンテナ内で
php artisan config:clear
php artisan config:cache
```

### データベースの再作成
```bash
# MariaDBコンテナで
docker exec -it myapp-mariadb mariadb -u root -proot -e "DROP DATABASE IF EXISTS development; CREATE DATABASE development;"
```