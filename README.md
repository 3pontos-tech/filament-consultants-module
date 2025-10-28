# Filament Consultants Module



A plug-and-play Filament module that adds a complete Consultant management experience to your Laravel + Filament admin. It ships with models, migrations, Filament resources, tables and forms so you can list, create, edit and tag consultants out of the box.

- Laravel friendly: configurable models and table names
- Filament plugin: enable it on any panel with one line
- Uses [spatie/laravel-tags](https://github.com/spatie/laravel-tags) for consultant tags
- Sensible defaults, easily customizable

> [!NOTE]
> This is an internal package used inside TresPontosTech projects. It is not intended to be used outside of our company.

## Requirements
- PHP and Laravel compatible with Filament (v3 recommended)
- Filament Admin installed in your app

## Installation
Install the package via Composer:

```bash
composer require 3pontos-tech/filament-consultants-module
```

### 1) Create the "backoffice" database connection (required)
This package expects a dedicated database connection named `backoffice`.

Add a new `backoffice` connection to your `config/database.php` and corresponding environment values.

- Please add the "backoffice" connection inside your Laravel `config/database.php` file.

Example `.env` entries:

```env
DB_BACKOFFICE_CONNECTION=mysql
DB_BACKOFFICE_HOST=127.0.0.1
DB_BACKOFFICE_PORT=3306
DB_BACKOFFICE_DATABASE=backoffice
DB_BACKOFFICE_USERNAME=root
DB_BACKOFFICE_PASSWORD=
```

Example `config/database.php` snippet:

```php
'connections' => [
    // ... your other connections

    'backoffice' => [
        'driver' => env('DB_BACKOFFICE_CONNECTION', 'mysql'),
        'host' => env('DB_BACKOFFICE_HOST', '127.0.0.1'),
        'port' => env('DB_BACKOFFICE_PORT', '3306'),
        'database' => env('DB_BACKOFFICE_DATABASE', 'backoffice'),
        'username' => env('DB_BACKOFFICE_USERNAME', 'root'),
        'password' => env('DB_BACKOFFICE_PASSWORD', ''),
        'unix_socket' => env('DB_SOCKET', ''),
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => null,
        'options' => extension_loaded('pdo_mysql') ? array_filter([
            PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
        ]) : [],
    ],
],
```

> If you prefer to use your default connection, you can override the model or config accordingly. See Configuration below.

### 2) Publish and run migrations
This package includes its own migrations and relies on Spatie Tags migrations.

```bash
php artisan vendor:publish --tag="filament-consultants-module-migrations"
php artisan vendor:publish --provider="Spatie\Tags\TagsServiceProvider" --tag="tags-migrations"
php artisan migrate
```

### 3) Publish the config (optional but recommended)

```bash
php artisan vendor:publish --tag="filament-consultants-module-config"
```

The published config looks like this (simplified):

```php
return [
    'consultants' => [
        'models' => [
            'consultant' => Consultant::class,
        ],
        'database' => [
            'table' => [
                'consultants' => 'consultants',
            ],
        ],
    ],
];
```

### 4) (Optional) Publish the views

```bash
php artisan vendor:publish --tag="filament-consultants-module-views"
```

## Configuration
- Model override: point `consultants.models.consultant` to your own model if you need custom logic or a different connection/table.
- Table names: change `consultants.database.table.consultants` to suit your schema.
- Database connection: if your app uses a non-default connection for consultants, set it on your custom model with:

```php
class Consultant extends Model
{
    protected $connection = 'backoffice';
}
```

## Filament integration
Register the plugin on your Filament panel provider:

```php
use TresPontosTech\Consultant\FilamentConsultantsPlugin;

// Inside your PanelProvider::panel() definition
return $panel
    ->plugins([
        FilamentConsultantsPlugin::make(),
    ]);
```

This will register the Consultants resource (forms, tables, pages) under your panel, allowing you to create, list and edit consultants.

## Usage
Once the plugin is enabled and migrations are run:
- Navigate to your Filament panel
- Open the Consultants resource
- Create, edit, and tag consultants

If you customized the model or table names, ensure your configuration matches your database.

## Troubleshooting
- Migration errors for tags: ensure you published Spatie Tags migrations and ran `php artisan migrate`.
- Connection not found: double‑check that the `backoffice` connection exists in `config/database.php` and `.env`.
- Class not found: verify that Composer autoload is up to date: `composer dump-autoload`.

## Testing

```bash
composer test
```

## Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.


## Credits
- [Paula Araujo](https://github.com/pilsaraujo)
- [Richard Greghi][https://github.com/richardgl11]

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
