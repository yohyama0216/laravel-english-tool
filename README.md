# laravel-english-tool
English Tool by Laravel

# フォルダ構成
```text
project-root/
├── backend/                   # Laravelのコードを配置
│   ├── app/                   # Laravelのアプリケーションコード
│   ├── bootstrap/             # Laravelのブートストラップファイル
│   ├── config/                # Laravelの設定ファイル
│   ├── database/              # データベースのマイグレーションやシーディング
│   ├── public/                # 公開用のファイル（例: index.php）
│   ├── resources/             # Bladeテンプレートや言語ファイル
│   ├── routes/                # アプリケーションのルート定義
│   ├── storage/               # ログやキャッシュ、アップロードファイル
│   ├── tests/                 # テストコード
│   ├── vendor/                # Composerの依存パッケージ
│   ├── .env                   # 環境変数ファイル
│   └── composer.json          # Composerの設定ファイル
│
├── frontend/                  # Reactのコードを配置
│   ├── public/                # Reactの公開用ファイル（index.htmlなど）
│   ├── src/                   # Reactのソースコード
│   │   ├── components/        # Reactのコンポーネント
│   │   ├── pages/             # 各ページのコンポーネント
│   │   ├── App.js             # Reactのメインコンポーネント
│   │   └── index.js           # Reactアプリケーションのエントリーポイント
│   ├── .env                   # React用の環境変数ファイル
│   ├── package.json           # npmの依存パッケージ
│   └── webpack.config.js      # Webpackの設定ファイル
│
├── docker/
│   ├── php/                   # PHP用のDocker設定
│   │   └── Dockerfile         # Laravel用のDockerfile
│   ├── node/                  # Node.js用のDocker設定
│   │   └── Dockerfile         # React用のDockerfile
│   ├── nginx/                 # Nginx用のDocker設定
│   │   └── default.conf       # Nginxの設定ファイル
│   └── docker-compose.yml     # Docker Composeの設定ファイル
│
└── .gitignore                 # Gitで管理しないファイルの設定
```
