FROM mysql:8

# install
# RUN apt-get update && apt-get install -y oooooo

# config
COPY ./docker-config/mysql/mysql-utf8.cnf   /etc/mysql/conf.d/mysql-utf8.cnf
RUN chmod 664                               /etc/mysql/conf.d/mysql-utf8.cnf

# permission
RUN mkdir -p  /var/log/mysql
RUN touch     /var/log/mysql/error.log /var/log/mysql/mysql.log /var/log/mysql/mysql-slow.log
RUN chmod 777 /var/log/mysql/error.log /var/log/mysql/mysql.log /var/log/mysql/mysql-slow.log

# RUN mkdir -p              /var/lib/mysql
# RUN chmod -R a+rwx        /var/lib/mysql
# RUN chown -R mysql.mysql  /var/lib/mysql


# information
ENV INFO='/tmp/info.txt'
RUN echo ''         >  INFO
RUN echo 'mysql'    >> INFO
RUN mysql --version >> INFO

RUN echo ''         >> INFO
