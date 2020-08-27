# crudwire
[![Latest Stable Version](https://poser.pugx.org/janmoo/crudwire/v)](//packagist.org/packages/janmoo/crudwire)
[![Total Downloads](https://poser.pugx.org/janmoo/crudwire/downloads)](//packagist.org/packages/janmoo/crudwire)
[![License](https://poser.pugx.org/janmoo/crudwire/license)](//packagist.org/packages/janmoo/crudwire)

This package provides a CRUD(create read update delete) interface, extending the laravel/ui auth package.
Cooked up with Livewire and a Dash of turbolinks. 
Get started right away with our [quickstart](#quickstart) guide or go to the [documentation](#documentation) section for more in depth information.

##### Checkout the official site [Crudwire.be](https://crudwire.be "Crudwire official website")

### Crudwire was built thanks to the following technologies.

*   **[Laravel-packager](https://github.com/Jeroen-G/laravel-packager "laravel-packager")**
*   **[Livewire](https://laravel-livewire.com/ "laravel-livewire official site")**
*   **[Laravel](https://laravel.com "official laravel site")**
*   **[Turbolinks.js](https://www.npmjs.com/package/turbolinks "npm turbolinks.js")**
*   **[Bootstrap](https://getbootstrap.com/ "Bootstrap official site")**

#### some screenshots:
![alt text](https://github.com/JanMoo/crudwireimages/blob/master/crudwirescreenshot1.png "screenshot user overview")
![alt text](https://github.com/JanMoo/crudwireimages/blob/master/screenshot2.png "create new user")

Quickstart
==========

Let's get this party started!
=============================

This is a quickstart guide, please check [documentation](#documentation) for more in depth information.

Install Laravel authentication
------------------------------

    composer require laravel/ui
        

    php artisan ui vue --auth
        

Migrate database.

Install Turbolinks
------------------

Install Turbolinks on your Laravel app.

    npm install turbolinks
        

Add Turbolinks to your `app.js` below bootstrap.js.

    require('./bootstrap');
        var Turbolinks = require("turbolinks")
        Turbolinks.start()
        

Add `data-turbolinks-track` attribute to your `script/css` tags. Make sure to check this happens on every page `layouts.app`.

    
        <head>
          <script defer src="{{ mix('js/app.js') }}" data-turbolinks-track="true" ></script>
    
          <link href="{{mix('css/app.css')}}" rel="stylesheet" data-turbolinks-track="true">
        </head>
        

Please check that your `app.js` is loaded on every page.

Install Crudwire
----------------

    composer require janmoo/crudwire
        

npm install && npm run dev

    npm install && npm run dev
        

All set and ready to go.
========================

Documentation
=============

Table of contents
-----------------

1.  [installation](#installation)
    1.  [Install Laravel authentication](#Install-Laravel-authentication)
    2.  [Install Turbolinks](#install-turbolinks)
    3.  [Install Crudwire](#install-crudwire)
2.  [Configuration options](#configuration)
    1.  [Publishing the configuration file](#publishing-the-configuration-file)
    2.  [routes](#routes)
    3.  [Adding AUTH to the middleware](#auth)
    4.  [Changing the pagination](#pagiantion)
    5.  [Change which columns are displayed in the user overview](#displayed-columns)
3.  [Extending and customizing this package](#extending-customizing)
    1.  [Changing the validation rules](#validation)
    2.  [Adding input elements to the `create` and `update` view](#input-elements)
    3.  [Customizing the Crudwire Views](#crudwire-views)

1 Installation
--------------

   **[Turbolinks.js](https://www.npmjs.com/package/turbolinks "npm turbolinks.js")**
and   **[Laravel authentication](https://laravel.com/docs/7.x/authentication "laravel authentication")**
must be installed to use Crudwire.

This package uses **[Bootstrap.](https://getbootstrap.com/ "bootstrap official site")**

#### 1.1 Install Laravel authentication

Install Laravel authentication on your app.

    composer require laravel/ui
    

    php artisan ui vue --auth
    

Migrate database.

#### 1.2 Install Turbolinks

Install Turbolinks on your laravel app.

    npm install turbolinks
    

Add Turbolinks to your `app.js` below `bootstrap.js`.

    require('./bootstrap');
    var Turbolinks = require("turbolinks")
    Turbolinks.start()
    

Add `data-turbolinks-track` attribute to your `script/css` tags. Make sure to check this happens on every page (layouts.app).

    <head>
      <script defer src="{{ mix('js/app.js') }}" data-turbolinks-track="true" ></script>
    
      <link href="{{mix('css/app.css')}}" rel="stylesheet" data-turbolinks-track="true">
    </head>
    

Plese check that your `app.js` is loaded on every page.

#### 1.3 Install Crudwire

Now you can install Crudwire.

    composer require janmoo/crudwire
    

Don't forget to run:

    npm install && npm run dev
        

Now you can run `php artisan serve`, and visit `localhost/crudwire/user`.

2 Configuration options
-----------------------

#### 2.1 Publishing the configuration file

To change the configuration options you must publish the configuration file, this can be done with the command below.

    php artisan vendor:publish --tag="crudwire.config"
    

#### 2.2 Routes

By default crudwire is configured to be served on the route `yourwebsite.example/crudwire/user`. This prefix can be changed by publishing the config.

Now you can add an `ENV` variable to the `.ENV``CRUDWIRE_PREFIX`.

e.g: `CRUDWIRE_PREFIX=happy` => yourwebsite.example/happy is where you will find the user overview.

The routes used by Crudwire are the following:

|route|name|method|
|--- |--- |--- |
|/CRUDWIRE_PREFIX/user|'crudwire.user.index'|GET|
|/CRUDWIRE_PREFIX/user/create|'crudwire.user.create'|GET|
|/CRUDWIRE_PREFIX/user|'crudwire.user.store'|POST|
|/CRUDWIRE_PREFIX/user/{user}/edit|'crudwire.user.edit'|GET|
|/CRUDWIRE_PREFIX/user/{user}|'crudwire.user.update'|PUT PATCH|

All of these routes use the `CruwireUsersController.php`.

#### 2.3 Adding AUTH to the middleware

`CRUDWIRE_MIDDLEWARE` can be added to the `.ENV`. This array contains all the middleware used by Crudwire routes, Crudwire uses the middleware `'web'`, make sure this is always present.

#### 2.4 The layouts used by Crudwire

To change the layout used by Crudwire. You should add `CRUDWIRE_LAYOUT` to the `.ENV` file. This variable defines the layout which crudwire uses to extend and display views. By default this is set to `crudwire::layouts.base`. Please don't forget to add the livewire directives `@@livewireStyles` and `@@livewireScripts` to your own layout. Add `turbolinks.js` and make sure your layout has a `@@section('content')`

#### 2.4 Changing the pagination

By adding the `CRUDWIRE_PAGINATION` variable to the `.ENV` file, you can change the default pagination which is set to 10. The value given to the variable should be a non negative integer.

#### 2.5 Change which columns are displayed in the user overview

By adding the `CRUDWIRE_DONT_DISPLAY` variable to the `.ENV`. This is an array containing the columnnames of the columns you wish not to display. The Default values are `["password","remebertoken"]`.

3 Extending and customizing this package
----------------------------------------

Please note that virtual columns are not supported yet.

#### 3.1 Changing the validation rules

When the config file is published, you will find that it contains two arrays with validation rules.

*   `validation_rules_create_new_user`: to validate newly created users.
*   `` `validation_rules_update_user`: to validate updated user's info.``

These arrays **should** be customized to reflect changes made to the `$user` model or migration. Crudwire is configured to display all fields that are `$fillable`.

#### 3.2 Adding input elements to the `create` and `update` view

In the config file `app/config/crudwire.php`, you will find an array `crudwire_form_inputs`, add the name of your blade components `$value` with a `$key` equal to the columnname to this array. An example of an input blade component can be found in `resources/views/vendor/crudwire/form/inputs`.

e.g.: Blade component name equal to `form.input.name` and DB columnname equal to name.

    'crudwire_form_inputs'                  => ['name'    => 'form.inputs.name'],
        

#### 3.3 Customizing the Crudwire Views

To customize the Crudwire Views, you should first publish them. This should be done with the following command.

    php artisan vendor:publish --tag="crudwire.views"
        

Once you have used the `vendor:publish` command you will find the views `resources/views/vendor/crudwire`. When customized Laravel will detect changes and use the customized view automatically.
