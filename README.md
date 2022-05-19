
# Nomademx (Gestor de venta de propiedades para empresa de bienes raíces)

## Primeros pasos

- Clonar el repositorio con ``git clone https://github.com/CalebCupul/realstate.git``
- Copiar el archivo .env.example a .env y editar las credenciales de acceso a la base de datos
- Ejecutar ``composer update``
- Ejecutar ``php artisan key:generate``
- Ejecutar ``php artisan migrate --seed``
- Ejecutar ``php artisan serve``

- Ahora puede iniciar sesión como:
    - Super Admin: ``sudo@sudo.com:password``
    - Admin: ``admin@admin.com:password``
    - User: ``user@user.com:password``

## Asignar permisos al rol User

- Iniciar sesión como Super Admin
- Dentro del CRUD de Roles, seleccionar el rol 'User' y asignarle los siguientes permisos:
    - sales.create
    - sales.edit
    - sales.show
    - users.edit
    - users.show
