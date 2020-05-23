Bienvenidos al proyecto "Prueba Kuepa".

Este es un proyecto en el cual se solicitó un sistema de estudiantes, el cual un enfoque fue realizado con roles y permisos en laravel 7, no alcancé a lograr todo el objetivo realizado por cuestiones de tiempo y unos temas en funcionamiento del ejercicio.

Para poder utilizar este proyecto, debes tener los siguientes requisitos:

debes tener la versión de PHP mayor o igual a la 7.2.5. para mas información visita la documentación oficial de Laravel: https://laravel.com/docs/7.x

debes tener instalado composer en tu equipo: https://getcomposer.org/

si utilizas windows, puedes descargar el programa git desde la página oficial: https://gitforwindows.org/

Si cumples con estos prerequisitos, entonces podrás instalar este proyecto.

Pasos para instalar este proyecto correctamente:

descarga este proyecto o clónalo con el comando:
git clone https://github.com/CamiloCapitano11/kuepa.git

ejecutar el comando:
composer install

copiar el archivo ".env.example" y pegarlo con el nombre: ".env". Si estas con el sistema gitforwindows, o en linux o mac, puedes ejecutar el siguiente comando:
cp .env.example .env

debemos generar una nueva llave de laravel con el siguiente comando:
php artisan key:generate

Configura la nueva base de datos modificando el archivo ".env":
DB_CONNECTION=mysql DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=clasificados_bd DB_USERNAME=clasificado_user DB_PASSWORD=CamiloRincon11

ejecuta php artisan migrate

ejecuta php artisan db:seed

ejecuta npm install && npm run dev

ejecuta php artisan serve y prueba el proyecto que debe funcionar.

Un saludo y Dios les bendiga a todos. 

De antemano agradecerles mucho por la oportunidad y mil disculpas, pero me tomé mucho tiempo con roles y permisos que no logré contar lo restante.
