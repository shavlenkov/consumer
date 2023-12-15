## Установка и настройка проекта

### Docker compose
* не забудьте сменить все доступы (логин и пароль) в файле `./docker-compose` к 
сервисам: db, pgadmin, pgbackups + в настройках ./app/www/.env файла
(не обязательно, если данные не менялись)

### Установка фреймворка laravel

* В файле ./docker-install.yml запускаем сервис **install** или 
в командной строке (запуск от корневной папке): 
``docker compose -f docker-install.yml up install``.
Ожидаем завершения (все сервисы будут автоматически остановлены)

* Останавливаем и удаляем все сервисы,
  файл ./docker-install.yml останавливаем и выгружаем сервисы **install, npm** или
  в командной строке (запуск от корневной папке):
  `` docker compose -f docker-install.yml down ``

* В файле ./app/www/.env добавить и отредактировать ключи если они не
отредактированы:
```dotenv
# Общие настройки
# Имя сайта
APP_NAME=Localhost
# Указываем версию сайта, включаем продакш версию
APP_ENV=production
# Отключаем вывод ошибок
APP_DEBUG=false
# Адрес сайта
APP_URL=https://localhost
# Адрес фронтенда
ASSET_URL=https://localhost

# Настройки БД
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
# Указать имя БД
DB_DATABASE=postgres
# Указать пользователя
DB_USERNAME=user
# Указать пароль
DB_PASSWORD="fg(45;liJFs#fdR&g!4"

QUEUE_CONNECTION=database

# Настройки Redis
CACHE_DRIVER=redis
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
REDIS_CLIENT=predis

# Гугл каптча
RECAPTCHA_SITE_KEY=
RECAPTCHA_SECRET_KEY=
RECAPTCHA_SKIP_IP=[]

# Ключ к редактору TinyMce
TINYMCE_API=
```

* В файле ./docker-install.yml запускаем сервис **update** или
в командной строке (запуск от корневной папке):
``docker compose -f docker-install.yml up update``. 
Ожидаем завершение создание образа (в Images должен появится образ update).

* После создание, останавливаем и освобождаем все сервисы.
  В командной строке (запуск от корневной папке):
``docker compose down``

### Запуск проекта
* В файле ./docker-compose.yml запускаем **services** или
  в командной строке (запуск от корневной папке):
  ``docker compose up``. Не получается создать сервисы - прерываем сервисы и запускаем заново.
  Если отсутствует файл ./app/www/public/storage
  тогда, заходим в контейнер `php` с помощью терминал и запускаем
  команду `cd /var/www/html && php artisan storage:link` - создаем публичную
  ссылку папки /storage/app/public (достаточно одного раза запустить команду)

### Остановка проекта
* В файле ./docker-compose.yml останавливаем **services** или
  в командной строке (запуск от корневной папке):
  ``docker compose stop``.

### Завершение проекта
* В файле ./docker-compose.yml останавливаем **services** или
  в командной строке (запуск от корневной папке):
  ``docker compose down``.

## Настройка проекта для разрботки
* В файле ./app/www/.env меняем значения в ключах:
```dotenv
APP_ENV=local
APP_DEBUG=true
ASSET_URL=https://localhost
# Или ASSET_URL=http://localhost:3000
```
* В файле ./docker-compose.yml сервисе **npm** меняем в строчках значения:
```yaml
  entrypoint: ["npm", "run", "dev", "--"]
  environment:
    APP_ENV: local
```

* Удалить файл если он существует ./app/www/public/hot

* ``Запускаем проект`` (смотреть пункт выше - "Запуск проекта")

* Импорт существующей БД. В файле ./docker-compose.yml сервисе **db**
в параметре **volumes** добавляем значение:
```- ./db/data/last/name_db.sql:/home/name_db.sql ```
В файле ./db/restore.sh меняем данные на свои
```text
psql -U user_name -d database_name < /home/name_db.sql
```
* Останавливаем и удаляем контейнер с помощью команды сервиса в редакторе ``db``
или консольной командой ``docker compose down db``. После чего, запускам повторно сервис ``db``
или консольной командой ``docker compose up db``. Если не помогло, заходим в сервис ``db``
и с помощью консольной команды указываем команду 
``psql -U user_name -d database_name < /home/name_db.sql``
  
* При глобальных изменений (добавление, удаление, обновление библиотек):
composer, npm нужно заново пересобирать образы и контейнеры

* Запускаем проект разработки:
1. Проект не запущен - в файле ./docker-compose.yml запускаем **services** или
   в командной строке (запускаем из корневной папке):
   ``docker compose up``.
2. Проект запущен - в файле ./docker-compose.yml запускаем сервис **npm** или
   в командной строке (запускаем из корневной папке):
   ``docker compose run npm``.
3. Не применились изменения - нужно остановить и освободить сервис **npm** или
   в командной строке (запускаем из корневной папке):
   ``docker compose down npm``. После заново запустить сервис **npm** или
   в командной строке (запускаем из корневной папке):
   ``docker compose run npm``.
4. Пустой экран - ссылка разработки открывается по https протоколу, поэтому,
   нужно вручную открыть ссылку https://localhost:3000 в новой вкладке браузера
   и подтвердить не подписанный сертификат. После, обновить страницу сайта

#### Заметки:
* Сервисы:
1. nginx - сервер nginx
2. redis - кэширование
3. db - базы данных postgres
4. php - интерпитатор php
5. redis-admin - панель управления по кэшированию redis
6. pgadmin - панель управления по работе с базой данных postgres
7. pgbackups - создание бэкапов баз данных postgres
8. queue - очереди для ларавел
9. cron - крон для ларавел
10. npm - node клиент