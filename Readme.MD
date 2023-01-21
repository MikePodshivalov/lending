# Artisan commands

Документация:
- `php artisan l5-swagger:generate` - Генерация документации OpenAPI

Общие команды управления:
- `php artisan reset-passwords:clean` - Удаление тухлых токенов восстановления пароля
- `php artisan api-authentication:code:clean` - Удаление тухлых кодов авторизации
- `php artisan client-contacts:translate:queue` - Отправка в очередь не распознанных контактов с клиентом
- `php artisan interview:result:send-statistic` - Постановка задания в очередь на согласование статистики по опросам
- `php artisan interview:result:refresh-statistic` - Полный перезапуск отправки статистики по опросам

Индексирование:
- `php artisan search:index:managers:refresh` - Переиндексация менеджеров в ElasticSearch
- `php artisan search:index:subdivisions:refresh` - Переиндексация подразделений в ElasticSearch
- `php artisan elastic:idx:refresh` - Обновление индексов ElasticSearch
- `npm run build` - Сборка стилей и скриптов проекта

Очереди:
- `php artisan queue:work` - Общий обработчик очередей
- `php artisan queue:work translate` - Обработчик очереди распознавания текста
- `php artisan queue:work sync-statistic` - Обработчик очереди согласования статистики
