# Prueba Tecnica Claro Insurance
MAILER
### Requerimientos

- Aplicativo con usuarios y roles basicamente 2
- El usuario Administrador puede ver agregar mas usuarios y puede ver los mensajes enviados por todos los usuarios con su respectivo estado. Encolado o Enviado
- Los correos son encolados cuando un usuario lo envia, debido a que estos se envian mediante un Command Artisan(se agrego un boton que por detras corre dicho command o en su defecto se lo corre por medio de la consola con el siguiente comando.), php artisan sendmail:envia-mails
- Los usuarios comunes solo podran ver sus y enviar sus propios mensajes
- Validacion de campos de formularios

### Instalación
Es necesario terner instalado composer en este caso

```sh
git clone https://github.com/lcoronelcosta/claroInsurance.git
cd claroInsurance
composer install
```

Luego tendremos que crear una base de datos vacia con el nombre que esta en el .env, para posterior correr el siguiente comando

```sh
php artisan migrate:refresh --seed
```
Y por ultimo corremos el proyecto con 
```sh
php artisan serve
```

> Note: `.env` contiene una cuenta gmail con permisos para aplicaciones de tercero con el objetivo de que los correos salgan por los servers de gmail.
usuario de pruebas estan en los seeders como rol administrado `admin@admin.com - pass: Administrador1@`, rol usuario final `user@user.com - pass:Usuario1@`

Verifique que el proyecto este corriendo el localhost en la siguiente direccion

```sh
127.0.0.1:8000
```

## License
MIT
**Free Software!**
