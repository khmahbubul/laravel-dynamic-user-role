## Demo Details

Super admin
Email: super-admin@gmail.com
Password: 12345678

Sub admin
Email: sub-admin@gmail.com
Password: 12345678

## Installation process

- git clone https://github.com/khmahbubul/laravel-dynamic-user-role.git
- composer install
- copy .env.example to .env
- php artisan key:generate
- create a database and set the name on .env file
- php artisan migrate:fresh --seed
- php artisan serve
