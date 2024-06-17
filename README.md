### RAPIDKIT -> SUPPORT FROM LARAVEL `11.X`

### # Installation

```
composer require intelrx/rapidkit
```

### # Artisan commands

Automatic Package installation and configuration
```
> php artisan rapid:install
```

Create new module with controller, Model, Migration and view resources. {--path=} is optional.
```
> php artisan rapid:make Country --path=Master
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