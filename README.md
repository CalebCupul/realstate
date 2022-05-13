
# Nomademx (Gestor de venta de propiedades para Nomademx)

## Primeros pasos

- Ejecutar ``composer update``
- Ejecutar ``php artisan key:generate``
- Ejecutar ``php artisan migrate --seed``

- Ahora puede iniciar sesion como:
    - Super Admin: ``sudo@sudo.com:password``
    - Admin: ``admin@admin.com:password``
    - User: ``user@user.com:password``

## Asignar permisos al rol User

- Loogearse como Super Admin
- Dentro del CRUD de Roles, seleccionar el rol 'User' y asignarle los siguientes permisos:
    - sales.create
    - sales.destroy
    - sales.edit
    - sales.show
    - users.edit
    - users.show
