# ��� ������ ��������� �������� �����, �� ����� ����������� ��� ������
FROM php:7.4-fpm
# �������������� ������ � ��������� ������ ������
MAINTAINER andreechka <man24@yandex.ru>

# RUN ��������� ������ �� ��� ������� � ��������� ������ ������.
# � ������ ������ �� ��������� ��������� ����������� � ������ PHP.
# ��� ��������� ������� ���������� ������� docker-php-ext-install.
# �� ������ RUN ��������� ����� ���� � ������, ������� ������������� ���������� �������.
RUN apt-get update && apt-get install -y \
	software-properties-common \
	npm \
        curl \
        wget \
        git \
	libonig-dev \
	libxml2-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
	libpq-dev \
	libzip-dev \
        zlib1g-dev \
        zip \
    && docker-php-ext-install -j$(nproc) bcmath ctype fileinfo json tokenizer xml mbstring pdo pdo_pgsql zip

RUN npm cache clean --force && npm install npm@latest -g && \
    npm install n -g && \
    n latest    


# ���� �� ��� composer'�.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get install -y \
	postgresql-client

# ������� ���� php.ini, ����� � ��� ���������� ���� �������� �������
#ADD php.ini /usr/local/etc/php/conf.d/40-custom.ini

#ADD /application /var/www

# ��������� ������� ���������� ��� PHP
WORKDIR /var/www

#RUN php artisan migrate:refresh

#ADD init-db.sh /tmp

# ��������� ���������
# �� ������������: The main purpose of a CMD is to provide defaults for an executing container. These defaults can include an executable, 
# or they can omit the executable, in which case you must specify an ENTRYPOINT instruction as well.
CMD ["php-fpm"]



#COPY ./entrypoint.sh /usr/bin/entrypoint.sh


#ENTRYPOINT [ "/usr/bin/entrypoint.sh" ]


