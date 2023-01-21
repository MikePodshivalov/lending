FROM nginx:latest

ARG UID=1
ARG GID=1

RUN usermod -u $UID -o nginx && groupmod -g $GID -o nginx

COPY ./src /var/www
#COPY --from=js /var/www/public/build /var/www/public/build
RUN chown -R "$UID:$GID" /var/www

COPY ./nginx/conf.d/nginx.cluster.conf /etc/nginx/nginx.conf
#COPY ./nginx/ssl /etc/ssl/certs
