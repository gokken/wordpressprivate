docker exec ${PWD##*/}_mysql_1 sh -c 'exec mysqldump --databases wordpress -u root -p "$MYSQL_ROOT_PASSWORD"' > mysql/db_dump.sql
