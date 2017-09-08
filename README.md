# Clean Laravel Project #  ![Laravel](https://bytebucket.org/scorchsoft/clean-laravel/raw/ea14099ab3f6e9e11442e546fe9facdee8235beb/public/img/laravel-logo-white.png?token=628110182cf4186d9853388df5b7c03385b3c495)

This is a clean [Laravel](https://laravel.com/) 5.4.36 project which uses [Quarx CMS](https://docs.quarxcms.com/)

### What is this repository for? ###

* Fresh Laravel Projects
* Version: 5.4.36


## Requirements

- [Node](https://nodejs.org) 4.* or better
- PHP 7.0.* or better


## Installation

Start by installing dependencies:

```sh
composer install
```


```sh
npm install
```


Publish the assets:

```sh
php artisan vendor:publish
```

Generate an app key:

```sh
php artisan key:generate
```

Set up Quarx CMS:
```sh
php artisan quarx:setup
```
This will set up the CMS, run the migrations and will create an admin account for you with the following credentials:

* admin@example.org
* admin


## Running

Once dependencies are installed, run with:

```sh
php artisan serve
```
This will open up a Laravel development server at localhost:8000


## Admin Access
Login to Admin Panel by visiting: www.yoursite.com/quarx/dashboard



### Contribution guidelines ###

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact