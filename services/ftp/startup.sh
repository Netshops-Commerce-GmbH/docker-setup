#!/bin/bash
rm -rf /ftp
ln -s /var/www/src /ftp
/usr/sbin/groupadd $FTP_USER
/usr/sbin/useradd $FTP_USER -m -d /ftp -g $FTP_USER -s /bin/bash

echo "$FTP_USER:$FTP_PASSWORD" | chpasswd
chown -h $FTP_USER:$FTP_USER /ftp

/usr/sbin/proftpd -n -c /etc/proftpd/proftpd.conf