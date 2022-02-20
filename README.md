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


## Регистрация и получение токена


## Действующие API


