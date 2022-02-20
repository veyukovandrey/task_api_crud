## Установка

Предполагаеться что Docker и Docker compose установлены.
>Если у Вас Windows, вы должны убедиться, что подсистема Windows для Linux 2 (WSL2) установлена и включена. WSL позволяет запускать двоичные исполняемые файлы Linux прямо в Windows 10. Информацию о том, как установить и включить WSL2, можно найти в документации Среда разработки. https://docs.microsoft.com/ru-ru/windows/wsl/install
 
- Устанавливаем Laraver

    curl -s https://laravel.build/setup | bash 

    cd setup && ./vendor/bin/sail up
- Клонируем проект с репозитория

     git clone https://github.com/veyukovandrey/task_api_crud.git
- Заходим в каталог и выполняем команду для развертывания /vendor

    cd task_api_crud
    
     docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html laravelsail/php81-composer:latest composer install --ignore-platform-reqs
 
> Под Windows изменить команду на 
>docker run --rm -u "1000:1000" -v $(pwd):/var/www/html -w /var/www/html laravelsail/php81-composer:latest composer install --ignore-platform-reqs

- Запускаем и заходим в контейнер

    docker-compose up -d

    docker-compose exec laravel.test bash
    
- Делаем миграции

    php artisan migrate
    
> Так же возможно сразу инициализировать базу данных синтетическими данными с командной строки или сделать это позже посредством API

- Для инициализации БД используйте следующую команду

    php artisan db:seed



> Сервер запуститься по адресу http://localhost на стандартном порту, убедитесь что он у Вас в данный момент не используется.



## Действующие API

#### Регистрация и получение токена

##### Запрос:

 curl -X POST http://localhost/api/register \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"name": "MyName", "email": "name@mail.com", "password": "Qwerty123$"}'

##### Ответ:
 
 {
    "access_token":"3|11Wj1gpR5O9XhDgYht4nPlYJ1WyJRhLQHSppQw7W",
    "token_type":"Bearer"
 }
 
 > Полученые токен и тип токена буду использоваться ниже в качестве примера (Вам нужно будет подставлять выданый Вам токен)
 
 
#### Логин и получение токена

 curl -X POST http://localhost/api/login \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -d '{"email": "name@mail.com", "password": "Qwerty123$"}'


#### Заполнение/оновление БД синтетическими данными

 curl -X POST http://localhost/api/init_db_fake_data \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
  -H "Authorization: Bearer 3|11Wj1gpR5O9XhDgYht4nPlYJ1WyJRhLQHSppQw7W"
 
#### Список действующих веществ

 curl -X GET http://localhost/api/substance/show \
 -H "Accept: application/json" \
 -H "Content-Type: application/json" \
 -H "Authorization: Bearer 3|11Wj1gpR5O9XhDgYht4nPlYJ1WyJRhLQHSppQw7W"
 
 
 #### Список производителей
 
  curl -X GET http://localhost/api/manufacturer/show \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer 3|11Wj1gpR5O9XhDgYht4nPlYJ1WyJRhLQHSppQw7W"
  
  
 #### Список всех лекарственных средств
 
  curl -X GET http://localhost/api/drag/show \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer 3|11Wj1gpR5O9XhDgYht4nPlYJ1WyJRhLQHSppQw7W"
  

#### Получить лекарственное средство по ID
 
  curl -X GET http://localhost/api/drag/show/{ID} \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer 3|11Wj1gpR5O9XhDgYht4nPlYJ1WyJRhLQHSppQw7W"
 
 
 
#### Добавить лекарственное средство
 
  curl -X POST http://localhost/api/drag/add \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer 3|11Wj1gpR5O9XhDgYht4nPlYJ1WyJRhLQHSppQw7W" \
  -d '{"title": "Enytitle", "substance_id": "4", "manufacturer_id": "2", "price": "435.78"}'
 
 
 #### Обновить лекарственное средство по ID
  
   curl -X PUT http://localhost/api/drag/update/{ID} \
   -H "Accept: application/json" \
   -H "Content-Type: application/json" \
   -H "Authorization: Bearer 3|11Wj1gpR5O9XhDgYht4nPlYJ1WyJRhLQHSppQw7W" \
   -d '{"title": "Updatetitle", "substance_id": "3", "manufacturer_id": "3", "price": "111.11"}'
  
  
   
 #### Удалить лекарственное средство по ID
  
   curl -X DELETE http://localhost/api/drag/delete/{ID} \
   -H "Accept: application/json" \
   -H "Content-Type: application/json" \
   -H "Authorization: Bearer 3|11Wj1gpR5O9XhDgYht4nPlYJ1WyJRhLQHSppQw7W" 
  


