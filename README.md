# Cinema3D

Proyecto Laravel del taller **Desarrollo de Formulario Web Interactivo** (SENA - ADSO), construido sobre la estructura MVC de la guía *MercadoSENA*.

- Formulario **Registro de información personal** con Bootstrap 5 (grid, radios en línea, checkboxes en 3 columnas).
- JavaScript: `preventDefault()`, captura de datos, render dinámico de la zona de resultados y scroll suave.
- Validación en el cliente (jQuery Validate) y en el servidor (`Validator` de Laravel).
- Guardado en MySQL y CRUD completo (listar, editar, eliminar) en `/registros`.

## Estructura MVC

| Elemento | Archivo |
|---|---|
| Migración | `database/migrations/*_create_registros_table.php` |
| Modelo | `app/Models/Registro.php` |
| Controlador | `app/Http/Controllers/RegistroController.php` |
| Rutas | `routes/web.php` (`Route::resource('registros', ...)`) |
| Plantilla | `resources/views/layout.blade.php` |
| Vistas | `resources/views/registros/` (`new`, `index`, `edit`) |
| Script SQL | `database/sql/cinema3d.sql` |

## Instalación (XAMPP)

1. Iniciar Apache y MySQL en XAMPP.
2. Crear la base de datos ejecutando `database/sql/cinema3d.sql` en phpMyAdmin (o solo crear la BD `cinema3d`).
3. En la carpeta del proyecto:

```bash
composer install
copy .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

4. Abrir http://localhost:8000 (redirige al formulario `registros/create`).
