# crudwire
[![Latest Stable Version](https://poser.pugx.org/janmoo/crudwire/v)](//packagist.org/packages/janmoo/crudwire)
[![Total Downloads](https://poser.pugx.org/janmoo/crudwire/downloads)](//packagist.org/packages/janmoo/crudwire)
[![License](https://poser.pugx.org/janmoo/crudwire/license)](//packagist.org/packages/janmoo/crudwire)

This package provides a CRUD(create read update delete) interface, extending the laravel/ui auth package.
Cooked up with Livewire and a Dash of turbolinks. 

##### [packagist link](https://packagist.org/packages/janmoo/crudwire "packagist - JanMoo/Crudwire")
##### [official website](https://crudwire.be "Crudwire official website")

#### some screenshots:
![alt text](https://github.com/JanMoo/crudwireimages/blob/master/crudwirescreenshot1.png "screenshot user overview")
![alt text](https://github.com/JanMoo/crudwireimages/blob/master/screenshot2.png "create new user")

Quickstart
==========

Let's get this party started!
=============================

This is a quickstart guide, please check documentation for more in depth information.

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

You should have succesfully installed crudwire.
===============================================

### Check out the documentation for more in depth info.
