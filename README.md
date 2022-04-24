# Student Management system

# Installation

```bash
npm run clean
```
## Setup Database and add host, port, database name and password to .env DB variables and serve to localhost

```bash
php artisan optimize:clear
php artisan migrate --seed
php artisan serve
```
Take a look at the browser and make sure you are looking at the correct port specified by the application.