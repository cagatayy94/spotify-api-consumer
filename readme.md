# Spotify Api Consumer
#### About The Application
Spotify Api Consumer created for consume Spotify API's and search over albums, artists, playlists, tracks or a combination of them. 
You can basically do:
  - Register and login on the application
  - Search over albums, artists, playlists, tracks or combination of them.

#### Working Demo
  - Open the address with your browser `https://spotify-consumer.tk`
  - You can register on application or use this credentials for login
  - Username: `user@user.com`
  - Password: `123123aa`

## Installation

Note: This application builded with Laravel Framework. Before the installation be sure your machine ready for run Laravel properly. You can find the Laravel requirements here: `https://laravel.com/docs/5.8/installation`

Open your terminal and clone the project on your machine.
```sh
git clone https://github.com/cagatayy94/spotify-api-consumer
```
Change your current directory with command below.
```sh
cd spotify-api-consumer
```
Create new database for the application. You can use Laravel supported database systems which is:
 - MySQL
 - Postgres
 - SQLite
 - SQL Server

After creating your database you should create `.env` file for application work properly. You can use the `.env.example` file on application root folder for set your credentials.

Note: Don't forget update that credentials below, otherwise project will not run
```sh
DB_CONNECTION=#DB_DRIVER# (sqlite, mysql, pgsql or sqlsrv)
DB_HOST=#DB_HOST#
DB_PORT=#DB_PORT#
DB_DATABASE=#DB_NAME#
DB_USERNAME=#DB_USER_NAME
DB_PASSWORD=#DB_PASSWORD#

SPOTIFY_ENDPOINT=#SPOTIFY_ENDPOINT#
SPOTIFY_CLIENT_ID=#SPOTIFY_CLIENT_ID#
APP_TO_SPOTIFY_SECRET=#SPOTIFY_CLIENT_ID#
```
Note: For the SPOTIFY_CLIENT_ID and APP_TO_SPOTIFY_SECRET parameters you should follow this steps: 
1. Login at here https://developer.spotify.com/dashboard/applications 
2. Create new app and you will see your client secret and client id inside the app which you created now.

After changed the credentials you should save the file as `.env`

Now you can install dependencies:
```sh
composer install
```

After installed dependencies, you are ready to migrate database:
```sh
php artisan migrate
```
If you get the following output, it means the application created necessary tables for connect and work.
```sh
Migration table created successfully.
```
If you getting any error about migrating the database, probably you wrote your database credentials wrong or you didn't create database properly.

Before start the application you should generate application key with:
```sh
php artisan key:generate
```

### Run On Localhost
If you want to run application on your local machine you can use PHP development server:
```sh
php artisan serve
```

## Deployment 

First of all you should configure your remote machine first.

If you don't know how to configure your remote machine, you can look the documentation for ubuntu below.

`https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-20-04`

When you configured your remote machine, be sure your machine has the following requirements for Laravel run on:
 - PHP >= 7.1.3
 - BCMath PHP Extension
 - Ctype PHP Extension
 - JSON PHP Extension
 - Mbstring PHP Extension
 - OpenSSL PHP Extension
 - PDO PHP Extension
 - Tokenizer PHP Extension
 - XML PHP Extension

When your machine ready, you should follow the instructions below, which I mentioned before in this documentation:
 - Clone the Project
 - Create the Database
 - Create your `.env` file
 - Install dependencies with: `composer install`
 - Migrate database with: `php artisan migrate`
 - Generate the app key with: `php artisan key:generate`

##### Important Notes:
 1.  If you install Nginx or Apache for host the application, be aware of your web server configuration pointing the application **public** folder.

For nginx you can look the example below:

```nginx
#/etc/nginx/sites-available/spotify-api-consumer
server {
    listen 80;
    server_name server_domain_or_IP;
    root /var/www/spotify-api-consumer/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

 2. If you don't want to application shows the errors on production, you should set some `.env` parameters like:
 - `APP_ENV=production` 
 - `APP_DEBUG=false`

Created by **Mustafa Çağatay Yılmaz**
