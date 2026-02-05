# Model
アプリとデータのロジックを司る部分の管理
eloquentを使う
app/Modelsに記載

# Controller
特定のURLに対して処理を行う
app/Controllers

docker exec -it myapp-php bash
モデルとセットで作成できる
php artisan make:controller PostController --model=Post

# View
ユーザーインターフェース
ユーザーが見るところ
blade テンプレートエンジン

#コンポーネント
再利用可能な仕組み
php artisan make:component Alert

slot
コンポーネント内で利用される内容

# tailwindcss
npm install tailwindcss postcss autoprefixer
npx tailwindcss init

# v3を明示的にインストール
npm uninstall tailwindcss
npm install -D tailwindcss@^3.4.0 postcss autoprefixer

# 確認
npm list tailwindcss

# 初期化
npx tailwindcss init -p