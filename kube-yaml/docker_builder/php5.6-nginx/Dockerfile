FROM reg.x1ankun.com/library/base/centos:7.2.1511v1.0.0
RUN yum install -y --enablerepo=remi --enablerepo=remi-php56 php php-opcache php-devel php-mbstring php-xml php-zip php-cli php-fpm php-mcrypt php-mysql php-pdo php-curl php-gd php-mysqld php-bcmath openssh-server nginx &&\
	yum clean all

COPY docker-entrypoint.sh /usr/local/bin/

ENTRYPOINT ["docker-entrypoint.sh"]