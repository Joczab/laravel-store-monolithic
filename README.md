# store-api

API REST de productos para una tienda, construida sobre Laravel (proyecto del Diplomado Full Stack Developer – URBE).

## Stack

- PHP 8.2+ · Laravel 12
- SQLite (por defecto) · PHPUnit 11
- Vite 7 + Tailwind CSS 4

## Instalación

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run build
```

## Uso

```bash
# Iniciar servidor de desarrollo
php artisan serve

# Crear un modelo (-m crea también su migración)
php artisan make:model Product -m

# Crear un controlador
php artisan make:controller ProductController

# Crear una migración
php artisan make:migration create_products_table

# Ejecutar las migraciones pendientes
php artisan migrate

# Rollback de migración (deshace el último lote)
php artisan migrate:rollback
```

## Endpoints

| Método | Ruta | Descripción |
|--------|------|-------------|
| GET  | `/products` | Lista todos los productos |
| GET  | `/products/{id}` | Obtiene un producto por id (404 si no existe) |
| GET  | `/products/search?name=` | Busca por nombre (prefijo, sin distinguir mayúsculas) |
| POST | `/products/create` | Crea un producto (`name`, `price`); 400 si el nombre ya existe |

> Los productos no usan base de datos: se guardan en la caché de archivos (`Cache::store('file')`), partiendo de 3 productos de ejemplo. Si se borra esa caché (`php artisan cache:clear file`), se pierden los productos creados y vuelven los de ejemplo.

## Estructura clave

- `routes/web.php` — rutas de la API
- `app/Http/Controllers/ProductController.php` — lógica de productos
- `bootstrap/app.php` — CSRF desactivado para `products/*`