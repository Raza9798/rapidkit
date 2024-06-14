## package folder structure

`packages\intelrx\rapidkit`

## In Root composer.json

```
"require": {
    "php": "^8.2",
    "laravel/framework": "^11.0",
    "laravel/tinker": "^2.9",
    "intelrx/rapidkit": "dev-main" // => add this line
},

"autoload": {
    "psr-4": {
        "App\\": "app/",
        "Database\\Factories\\": "database/factories/",
        "Database\\Seeders\\": "database/seeders/",
        "Rapidkit\\": "rapidkit/"  // => add this line
    }
},
```

```
   "repositories": {
        "rapidkit": {
            "type": "path",
            "url": "packages/intelrx/rapidkit",
            "options": {
                "symlink": true
            }
        }
    },
```

## INSTALL THE PACKAGE
RUN `composer update`

### artisan commands
Create new module with controller, Model, Migration and view resources. {--path=} is optional.
```
> php artisan make:module Country --path=Master
```
