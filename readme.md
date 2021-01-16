# Cartavel - E-commerce cart management system

<p align="center">
<a href="https://packagist.org/packages/a4anthony/cartavel"><img src="https://poser.pugx.org/a4anthony/cartavel/downloads.svg?format=flat" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/a4anthony/cartavel"><img src="https://poser.pugx.org/a4anthony/cartavel/v/stable.svg?format=flat" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/a4anthony/cartavel"><img src="https://poser.pugx.org/a4anthony/cartavel/license.svg?format=flat" alt="License"></a>
</p>

## Prerequisite
To use this package, migration files for users and items/inventory/products table must have been set up.

## Installation Steps
After creating your new Laravel application you can include the cartavel package with the following command:
```bash
composer require a4anthony/cartavel
```
**Laravel ^5.5** uses Package Auto-Discovery, so it doesn't require you to manually add the ServiceProvider/Facade.

After updating composer, add the ServiceProvider to the providers array in config > app.php

```php
A4anthony\Cartavel\CartavelServiceProvider::class
```

Optionally you can use the Facade for shorter code. Add this to your facades in the aliases array in config > app.php:

```php
"Cartavel" => \A4anthony\Cartavel\Facades\Cartavel::class
```

To configure this package to suit your project, publish the cartavel config file
```bash
 php artisan vendor:publish --tag=config
```
Go to config > cartavel.php and adjust the settings to suit your project
```php
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Users Table Name
    |--------------------------------------------------------------------------
    |
    | Here you can specify the users table name.
    |
    */

    'users_table_name' => 'users',

    /*
    |--------------------------------------------------------------------------
    | User Table Unique Column
    |--------------------------------------------------------------------------
    |
    | Here you can specify the unique column to be used from your users table
    |
    */

    'users_table_unique_column' => 'id',

    /*
    |--------------------------------------------------------------------------
    | Cart Table Name
    |--------------------------------------------------------------------------
    |
    | Here you can specify the cart table name.
    |
    */

    'cart_table_name' => 'carts',

    /*
    |--------------------------------------------------------------------------
    | Items/Products Table Name
    |--------------------------------------------------------------------------
    |
    | Here you can specify the table name for your items/products
    |
    */

    'items_table_name' => 'products',

    /*
    |--------------------------------------------------------------------------
    | Items/Products Table Name Unique Column
    |--------------------------------------------------------------------------
    |
    | Here you can specify the unique column to be used from your items/products table
    |
    */

    'items_table_unique_column' => 'id',
];

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

To seed the cart with dummy data, it will require that you first seed your users and items/inventory/products table first and the run
```bash
php artisan cartavel:seed
```

To use this package, import the cartavel package

```php
use A4anthony\Cartavel\Facades\Cartavel;
```

List of all available methods

```php
Cartavel::get($userId, true); //gets users cart items

Cartavel::add($userId, $itemId, $quantity); //adds item to user's cart

Cartavel::update($userId, $itemId, $quantity); //updates quantity o item in user's cart

Cartavel::delete($userId, $itemId); //deletes item from user's cart

Cartavel::clear($userId); //clears user's cart
```

## ENJOY!!!

# Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
Please make sure to update tests as appropriate.

# License

[MIT](https://choosealicense.com/licenses/mit/)
