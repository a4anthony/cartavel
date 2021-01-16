# Cartavel - E-commerce cart management system
<a href="https://packagist.org/packages/a4anthony/cartavel"><img src="https://poser.pugx.org/a4anthony/cartavel/downloads.svg?format=flat" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/a4anthony/cartavel"><img src="https://poser.pugx.org/a4anthony/cartavel/v/stable.svg?format=flat" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/a4anthony/cartavel"><img src="https://poser.pugx.org/a4anthony/cartavel/license.svg?format=flat" alt="License"></a>

## Installation Steps
After creating your new Laravel application you can include the coupon package with the following command:
```bash
composer require a4anthony/cartavel
```
**Laravel ^5.5** uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider/Facade. If you also use laravel-dompdf, watch out for conflicts. It could be better to manually register the Facade.

After updating composer, add the ServiceProvider to the providers array in config/app.php

```php
A4anthony\Cartavel\CartavelServiceProvider::class
```

Optionally you can use the Facade for shorter code. Add this to your facades:

```php
"Cartavel" => \A4anthony\Cartavel\Facades\Cartavel::class
```

Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
Run migrations
```bash
php artisan migrate
```