### RAPIDKIT -> SUPPORT FROM LARAVEL `11.X`

RAPIDKIT for Laravel is a collection of pre-built functionalities designed to accelerate web application development. It offers a robust set of commands to modularize projects, enabling developers to create highly customizable applications swiftly.

## # Key Features

- **Modular Structure:** Easily modularize your Laravel projects for better organization and scalability.
- **Pre-built Functionalities:** Includes a rich set of pre-built features to jumpstart development.
- **Customizability:** Allows for extensive customization to fit specific project requirements.
- **Rapid Development:** Speeds up the development process by providing ready-to-use components and utilities.

### # Installation

```
composer require intelrx/rapidkit
```

### # Artisan commands

Automatic Package installation and configuration
```
php artisan rapid:install
```

Useful command for development
```
> php artisan rapid:make Country --path=Master   Create separate module resources
```

### # DATABASE BACKUP COMMANDS
```
 > php artisan backup:clean               Clean it by configured number of days.
 > php artisan backup:list                Display a list of all backups.
 > php artisan backup:monitor             Monitor the health of all backups.
 > php artisan backup:run                 Run the backup.
 > php artisan backup:run --only-db       Only Database backup
 > php artisan backup:run --only-files    FileSystem backup
```

### # TELESCOPE COMMANDS
```
  > php artisan telescope:clear               Delete all Telescope data from storage
  > php artisan telescope:pause               Pause all Telescope watchers
  > php artisan telescope:prune               Prune stale entries from the Telescope database
  > php artisan telescope:prune --hours=48    Prune stale entries by time
  > php artisan telescope:publish             Publish all of the Telescope resources
  > php artisan telescope:resume              Unpause all Telescope watchers
```

### # EXPORT & IMPORT EXCEL COMMANDS
```
  > php artisan make:import UsersImport --model=User
  > php artisan make:export UsersExport --model=User
```
