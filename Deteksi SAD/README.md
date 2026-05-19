# Smart Trolley - SAD (Laravel 11) - Partial Files

This ZIP contains the app, routes, resources and database files required for the Smart Trolley Social Anxiety Disorder system.
It is NOT a full Laravel installation (vendor/ and artisan are not included).

Steps:
1. Create a fresh Laravel 11 project: `composer create-project laravel/laravel:^11.0 smart-trolley`
2. Copy these files into the project root (overwrite where needed).
3. Run `composer install`
4. Copy `.env.example` to `.env` and set DB credentials, then `php artisan key:generate`
5. Run `php artisan migrate --seed`
6. Run `php artisan serve`
Admin credentials from seeder: admin@example.com / password
