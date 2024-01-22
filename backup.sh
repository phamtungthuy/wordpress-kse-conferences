#!/bin/bash

# Định nghĩa biến thời gian
DATE=$(date +"%Y-%m-%d_%H-%M-%S")

# Định nghĩa các thư mục và tệp tin bạn muốn backup
WP_DIR="/var/www/wordpress"
BACKUP_DIR="/var/www/backup/wordpress"
DATABASE_NAME="wordpress_db"
DATABASE_USER="wp_user"
DATABASE_PASSWORD="password"

# Backup các tệp tin và thư mục của WordPress
#sudo tar -czvf $BACKUP_DIR/wordpress_$DATE.tar.gz $WP_DIR

# Backup database của WordPress
sudo docker exec centos7 mysqldump -u $DATABASE_USER -p$DATABASE_PASSWORD $DATABASE_NAME > $BACKUP_DIR/wordpress_db_$DATE.sql

# Xóa các bản backup cũ hơn 7 ngày
sudo find $BACKUP_DIR/* -mtime +7 -exec rm {} \;

