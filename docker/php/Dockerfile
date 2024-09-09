# ベースイメージとしてPHP 8.2を使用
FROM php:8.2-fpm

# システムの更新と必要なパッケージのインストール
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libpq-dev \
    libbz2-dev \
    libzip-dev \
    libicu-dev \
    libsqlite3-dev \
    libmcrypt-dev \
    default-mysql-client

# MySQLドライバのインストール
RUN docker-php-ext-install pdo pdo_mysql

# Composerのインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 作業ディレクトリの設定
WORKDIR /var/www

# Laravelプロジェクトのファイルをコピー
COPY backend /var/www

# Composerの依存関係をインストール
RUN composer install --optimize-autoloader --no-dev

# パーミッションの設定
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

EXPOSE 9000

CMD ["php-fpm"]
