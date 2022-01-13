FROM php:7.2-fpm
RUN docker-php-ext-install pdo_mysql
COPY php.ini /usr/local/etc/php/

# could not find driver PHPの初期段階→使えるデータベーsにmysqlが入ってない→mysqlに接続できない→PHPのコンテナにmysqlを入れることでmysqlを使えるようにした
# dockerのbuild→dockerfileを書き換えた時はbuildし直す→dockerfileはbuildした時に読まれるものだから
# docker-compose build --no-cache
# build しなくても最初に書いたdockerfileは実行されてた→最初にコンテナを作ってない状態でdokcer-compose upすると最初はbuildもやってくれるから