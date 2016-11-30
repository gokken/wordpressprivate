# デプロイ先に合わせて決めておく。
FROM mysql:5.5
# SQLダンプを初期化時に読み込む
ADD db_dump.sql /docker-entrypoint-initdb.d
