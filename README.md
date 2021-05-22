### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/mirzarizky/vascomm_be.git
   ```
2. Install package dependencies
   ```sh
   composer install
   ```
3. Setup environtment variables in `.env` file.
   
   You can copy from `.env.example` then generate `APP_KEY` by running artisan command:
   ```sh
   php artisan key:generate
   ```
4. Run database migration
   ```sh
   php artisan migrate --seed
   ```
5. Linking storage
   
   Since we use local storage (public disk) as the filesystem, we need  to create symbolic link, you may use `storage:link` artisan command:
   ```sh
   php artisan storage:link
   ```
6. Serve the application
   ```sh
   php artisan serve
   ```
7.  You're good to go!

### Admin Access

To create user with admin access with command:
```sh
php artisan create:admin your@adminemail.com yourpassword
```

## Dummy Data

Generate dummy with seeders command:
```sh
php artisan db:seed --class=DummyProductSeeder
```
