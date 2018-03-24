FROM daocloud.io/library/centos:7.2.1511

RUN yum install -y epel-release &&\
	rpm -ivh https://mirrors.tuna.tsinghua.edu.cn/remi/enterprise/remi-release-7.rpm &&\
	yum install -y --enablerepo=remi --enablerepo=remi-php71 php php-opcache php-devel php-mbstring php-xml php-zip php-cli php-fpm php-mcrypt php-mysql php-pdo php-curl php-gd php-mysqld php-bcmath nginx git&&\
	yum clean all

RUN curl -sSL https://getcomposer.org/installer | php &&\
    mv composer.phar /usr/local/bin/composer &&\
    composer config -g repo.packagist composer https://packagist.phpcomposer.com &&\
    composer global require "fxp/composer-asset-plugin:^1.3.1" -vvv &&\
    composer config --global github-oauth.github.com 5789e2db6e074634cbbacbe592747d8329557baa

RUN mkdir /data &&\
    cd /data &&\
    git clone https://github.com/yiiplus/scaffold.git &&\
    cd scaffold &&\
    composer install -vvv &&\
    php init --env=Development --overwrite=y

COPY scaffold.local.conf /etc/nginx/conf.d/

COPY docker-entrypoint.sh /usr/local/bin/

EXPOSE 9000
EXPOSE 80

CMD ["docker-entrypoint.sh"]