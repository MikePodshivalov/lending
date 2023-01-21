#!/bin/sh

until php artisan queue:work --stop-when-empty; do
  >&2 echo "RabbitMQ is unavailable - sleeping"
  sleep 1
done

>&2 echo "RabbitMQ is available - run query $1"

php artisan queue:work --queue=jobs --sleep 3
