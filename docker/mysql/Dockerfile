FROM mysql:8.0

ENV MYSQL_DATABASE=azatora_db \
  MYSQL_USER=azatora \
  MYSQL_PASSWORD=azatora \
  MYSQL_ROOT_PASSWORD=root \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/mysql/conf.d/my.cnf
RUN chmod 644 /etc/mysql/conf.d/my.cnf
