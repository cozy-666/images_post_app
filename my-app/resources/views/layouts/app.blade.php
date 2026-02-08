<!DOCTYPE html>
<html lang="ja" class="antialiased">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - イノセントSNS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Noto Sans JP', sans-serif; }
        /* ヘッダー・フッター：Tailwindビルドに依存せず青を確実に表示 */
        .app-header { background: linear-gradient(90deg, #2563eb 0%, #1d4ed8 100%); color: white; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); position: sticky; top: 0; z-index: 50; }
        .app-footer { background: #1d4ed8; color: white; padding: 1.5rem; margin-top: auto; }
        .app-body { min-height: 100vh; display: flex; flex-direction: column; background: #f8fafc; }
        .app-main { flex: 1; max-width: 56rem; width: 100%; margin: 0 auto; padding: 2rem 1rem; }
        /* ボタン共通スタイル */
        .btn-primary { display: inline-flex; align-items: center; justify-content: center; background: #2563eb; color: white; font-weight: 600; padding: 0.625rem 1.25rem; border-radius: 0.5rem; text-decoration: none; border: none; cursor: pointer; font-size: 0.9375rem; transition: background 0.2s; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-danger { display: inline-flex; align-items: center; justify-content: center; background: white; color: #dc2626; font-weight: 600; padding: 0.625rem 1.25rem; border-radius: 0.5rem; border: 1px solid #fecaca; cursor: pointer; font-size: 0.9375rem; transition: all 0.2s; }
        .btn-danger:hover { background: #fef2f2; border-color: #f87171; }
        .link-back { color: #475569; font-size: 0.875rem; font-weight: 500; text-decoration: none; }
        .link-back:hover { color: #2563eb; }
    </style>
</head>
<body class="app-body">
    <header class="app-header">
        <div style="max-width: 56rem; margin: 0 auto; padding: 1rem 1.5rem;">
            <a href="{{ route('posts.index') }}" style="font-size: 1.25rem; font-weight: 700; color: white; text-decoration: none;">
                イノセントSNSアプリ
            </a>
        </div>
    </header>

    <main class="app-main">
        @yield('content')
    </main>

    <footer class="app-footer">
        <div style="max-width: 56rem; margin: 0 auto; text-align: center; font-size: 0.875rem; color: rgba(255,255,255,0.9);">
            © 2026 イノセントSNSアプリ
        </div>
    </footer>
</body>
</html>
