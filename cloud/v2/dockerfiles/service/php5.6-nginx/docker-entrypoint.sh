#!/bin/bash
# auther: ge2x3k2@gmail.com

#ssh-keygen -t rsa -b 2048 -f /etc/ssh/ssh_host_rsa_key

sed -i '38,57d' /etc/nginx/nginx.conf

/usr/sbin/php-fpm -c /etc/php.ini -y /etc/php-fpm.conf

nginx -c /etc/nginx/nginx.conf -g 'daemon off;'