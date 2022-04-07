FROM php:7.3.6-fpm

RUN apt-get update && apt-get install -qqy git unzip libzip-dev libxml2-dev libfreetype6-dev libpq-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libaio1 wget && apt-get clean autoclean && apt-get autoremove --yes &&  rm -rf /var/lib/{apt,dpkg,cache,log}/ 

#composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV DOCKERIZE_VERSION v0.6.1

RUN mkdir /opt/dockerize

ADD .docker/dockerize/dockerize-0.6.1.zip /opt/dockerize

RUN unzip /opt/dockerize/dockerize-0.6.1.zip -d /usr/local/bin

RUN rm /opt/dockerize/dockerize-0.6.1.zip

# ORACLE oci 
RUN mkdir /opt/oracle \
    && cd /opt/oracle     
    
ADD .docker/oracle/instantclient-basic-linux.x64-19.13.0.0.0dbru-2.zip /opt/oracle
ADD .docker/oracle/instantclient-sdk-linux.x64-19.13.0.0.0dbru-2.zip /opt/oracle

# Install Oracle Instantclient
RUN  unzip /opt/oracle/instantclient-basic-linux.x64-19.13.0.0.0dbru-2.zip -d /opt/oracle \
    && unzip /opt/oracle/instantclient-sdk-linux.x64-19.13.0.0.0dbru-2.zip -d /opt/oracle \
    && ln -s /opt/oracle/instantclient_19_13/libclntsh.so.19.13 /opt/oracle/instantclient_19_13/libclntsh.so.19.13 \
    && ln -s /opt/oracle/instantclient_19_13/libclntshcore.so.19.13 /opt/oracle/instantclient_19_13/libclntshcore.so.19.13 \
    && ln -s /opt/oracle/instantclient_19_13/libocci.so.19.13 /opt/oracle/instantclient_19_13/libocci.so.19.13 \
    && rm -rf /opt/oracle/*.zip
    
ENV LD_LIBRARY_PATH  /opt/oracle/instantclient_19_13:${LD_LIBRARY_PATH}
    
# Install Oracle extensions
RUN echo 'instantclient,/opt/oracle/instantclient_19_13/' | pecl install oci8-2.2.0 \ 
      && docker-php-ext-enable \
               oci8 \ 
       && docker-php-ext-configure pdo_oci --with-pdo-oci=instantclient,/opt/oracle/instantclient_19_13,19.1 \
       && docker-php-ext-install \
               pdo_oci 

RUN docker-php-ext-install bcmath zip json mbstring xml \
&& docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql

WORKDIR /var/www
RUN rm -rf /var/www/html
COPY . /var/www

RUN ln -s public html

#RUN usermod -u 1000 www-data
#USER www-data
EXPOSE 9000

ENTRYPOINT ["php-fpm"]
