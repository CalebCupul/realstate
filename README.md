
# Nomademx (Gestor de venta de propiedades para empresa de bienes raíces)

## Primeros pasos

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
    - sales.destroy
    - sales.edit
    - sales.show
    - users.edit
    - users.show
