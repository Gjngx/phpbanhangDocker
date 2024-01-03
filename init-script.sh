#!/bin/bash

# Đợi cho MySQL khởi động
sleep 20

# Thực hiện lệnh SQL từ tệp db_bookstore.sql
mysql -hdb -uroot -p${MYSQL_ROOT_PASSWORD} ${MYSQL_DATABASE} < /docker-entrypoint-initdb.d/db_bookstore.sql
