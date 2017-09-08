![alt text](http://www.knocktechbd.com/images/technology/laravel.png)

# Clean Laravel Project

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



## CRUD Builder
To use the CRUD builder you need to run the following command:
```sh
php artisan crudmaker:new Post --api --ui=bootstrap --migration --schema="id:increments,name:string,author:string" --relationships="belongsToMany|\App\Models\Tag|tags"
```
You can use the following options for the above command:
```sh
php artisan crudmaker:new ModelName
{--api}
{--ui=bootstrap|semantic}
{--serviceOnly}
{--withFacade}
{--withoutViews}
{--migration}
{--schema}
{--relationships}
```

You can view the full documentation for this [here](https://laracogs.com/docs/services/crud/)  

### Contribution guidelines ###

* Writing tests
* Code review
* Other guidelines

### Who do I talk to? ###

* Repo owner or admin
* Other community or team contact