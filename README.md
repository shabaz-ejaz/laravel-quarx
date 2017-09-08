# Clean Laravel Project #

This is a clean [Laravel](https://laravel.com/) 5.4.36 project which uses [Quarx CMS](https://docs.quarxcms.com/)

### What is this repository for? ###

* Fresh Laravel Projects
* Version: 5.4.36


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
This will set up the CMS and will create an admin account for you with the following credentials:

admin@example.org
admin

## Running

Once dependencies are installed, run with:

```sh
php artisan serve
```
This will open up a Laravel development server at localhost:8000


### Contribution guidelines ###

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact