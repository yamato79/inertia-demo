# Inertia Demo

This is an application built using Laravel 8 and Inertia.js using Vue.js 3. The front-end was built using resources available through [TailwindCSS](https://tailwindcss.com/)

## Requirements
General Laravel 8 requirements apply. Please see the server requirements [here](https://laravel.com/docs/8.x/deployment#server-requirements).

There exists only one additional requirement and that is you need to install the php-dom extension for your chosen php version as the application uses DOM Document to format the seed data.

### Database
This has been tested with MySQL/MariaDB as its database and it is recommended that you use that as well. This has not been tested with MySQL's newer authentication methods and is using the password method.

### PHP
This has been tested with PHP 7.4.16. There is no guarantee the application will work flawlessly in versions other than PHP 7.4.

## Deployment Instructions
This is a standard Laravel 8 deployment. After server requirements are met, you may spin-up the application with the following commands below. It is recommended that these commands be run on each deployment or in the preparation phase such that compiled assets and versions are up to date.
```
composer install
php artisan migrate --seed
npm install
npm run prod
```

You may then run the following command to host a test server locally and test the application.
```
php artisan serve
```

## Screenshots
### Landing Page
![Home](/docs/screenshots/home.png)
### Documents Index
![Home](/docs/screenshots/documents-index.png)

### Admin Resources Index
![Home](/docs/screenshots/admin-resources-index.png)

### Admin Snippet Edit
![Home](/docs/screenshots/admin-snippet-edit.png)

## Resources
- [Laravel 8](https://laravel.com/docs/8.x).
- [Vue.js 3](https://v3.vuejs.org).
- [Inertia.js](https://inertiajs.com/).
- [TailwindCSS](https://tailwindcss.com/).
- [TailwindUI](https://tailwindui.com/).
- [Acme Logo](http://acmelogos.com/).
- [Ace Editor](https://ace.c9.io/).
