FROM daocloud.io/library/centos:7.2.1511

RUN yum install -y readline-devel pcre-devel openssl-devel perl wget gcc make &&\
    wget https://openresty.org/download/openresty-1.11.2.3.tar.gz &&\
    tar xzvf openresty-1.11.2.3.tar.gz &&\
    cd openresty-1.11.2.3 &&\
    ./configure --prefix=/opt/openresty\
             --with-luajit\
             --without-http_redis2_module \
             --with-http_iconv_module &&\
    make && make install &&\
    ln -s /opt/openresty/nginx/conf /etc/nginx

RUN yum install -y epel-release &&\
	rpm -ivh https://mirrors.tuna.tsinghua.edu.cn/remi/enterprise/remi-release-7.rpm &&\
	yum install -y --enablerepo=remi --enablerepo=remi-php71 php php-opcache php-devel php-mbstring php-xml php-zip php-cli php-fpm php-mcrypt php-mysql php-pdo php-curl php-gd php-mysqld php-bcmath openssh-server nginx &&\
	yum clean all

COPY docker-entrypoint.sh /usr/local/bin/

EXPOSE 9000
EXPOSE 80

CMD ["docker-entrypoint.sh"]