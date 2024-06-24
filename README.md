### RAPIDKIT -> SUPPORT FROM LARAVEL `11.X`

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
 > backup:clean               Clean it by configured number of days.
 > backup:list                Display a list of all backups.
 > backup:monitor             Monitor the health of all backups.
 > backup:run                 Run the backup.
 > backup:run --only-db       Only Database backup
 > backup:run --only-files    FileSystem backup
```

### # TELESCOPE COMMANDS
```
  > telescope:clear               Delete all Telescope data from storage
  > telescope:pause               Pause all Telescope watchers
  > telescope:prune               Prune stale entries from the Telescope database
  > telescope:prune --hours=48    Prune stale entries by time
  > telescope:publish             Publish all of the Telescope resources
  > telescope:resume              Unpause all Telescope watchers
```

### # EXPORT & IMPORT COMMANDS
```
  > php artisan make:import UsersImport --model=User
  > php artisan make:export UsersExport --model=User
```