# ===============================
# PHP 7.4 + Apache の公式イメージを使用
# ===============================
FROM php:7.4-apache

# ===============================
# 必要なPHP拡張をインストール
# pdo         → DB抽象化レイヤー
# pdo_mysql   → MySQL接続用PDOドライバ
# mysqli      → MySQL接続拡張（Yii1で使用されることがある）
# ===============================
RUN docker-php-ext-install pdo pdo_mysql mysqli

# ===============================
# Apacheのmod_rewriteを有効化
# YiiはURLルーティングで.htaccessを使うため必須
# ===============================
RUN a2enmod rewrite

# ===============================
# コンテナ内の作業ディレクトリを指定
# Apacheのドキュメントルートは /var/www/html
# ===============================
WORKDIR /var/www/html