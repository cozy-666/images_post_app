# マイグレーション実行
php artisan migrate

# 最後のマイグレーションをロールバック
php artisan migrate:rollback

# 全てロールバック
php artisan migrate:reset

# 全てロールバックして再実行
php artisan migrate:refresh

# データベースを削除して再作成＋マイグレーション
php artisan migrate:fresh

# マイグレーション状況確認
php artisan migrate:status