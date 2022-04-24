#!/bin/sh
composer install
npm install
npm run dev
cp .env.example .env
php artisan key:generate
php artisan storage:link
php artisan optimize
