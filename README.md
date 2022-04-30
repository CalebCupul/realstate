
# RedEmpleo *(Gestor de vacantes para empresas)*
---

## Primeros pasos

- Clonar el repositorio.
``git clone git@gitlab.com:cucosta/projects/redempleo.git
``
- Copiar el archivo .env.example a .env y editar las credenciales de acceso a la base de datos
- Ejecutar ``composer update``
- Ejecutar ``php artisan key:generate``
- Ejecutar ``php artisan migrate --seed``
- Ahora puede iniciar sesion como:
    - Super Admin: ``sudo@sudo.com:password``
    - Admin: ``admin@admin.com:password``
    - User: ``user@user.com:password``
