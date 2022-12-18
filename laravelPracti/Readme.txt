1. Primero creamos el proyecto, para ello tenemos que ejecutar el siguiente comando en la carpeta en la que queremos que se cree:
composer create-project laravel/laravel laravelPracti

2. Si estás dentro de la carpeta creada anteriormente hay que arrancar laravel, si no estas dentro tienes que hacer "cd laravelPracti":
php artisan serve

3.  Este comando es para crear una migración, esta migración crear una tabla:
php artisan make:migration create_alumnos_table

4. Las nuevas migraciones la ejecutamos con:
php artisan migrate

5. Con este comando creamos un seeder:
php artisan make:seeder AlumnoSeeder

6. Los Seeder los ejecutamos con:
php artisan db:seed --class=AlumnoSeeder

7. Creamos un controller con el comando:
php artisan make:controller AlumnoController

8.  Para crear un middleware usamos:
php artisan make:middleware ValidarId