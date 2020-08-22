# crudwire
[![Latest Stable Version](https://poser.pugx.org/janmoo/crudwire/v)](//packagist.org/packages/janmoo/crudwire)
[![Total Downloads](https://poser.pugx.org/janmoo/crudwire/downloads)](//packagist.org/packages/janmoo/crudwire)
[![License](https://poser.pugx.org/janmoo/crudwire/license)](//packagist.org/packages/janmoo/crudwire)

This package provides a CRUD(create read update delete) interface, extending the laravel/ui auth package.
Cooked with Livewire and a Dash of turbolinks. 

[packagist link](https://packagist.org/packages/janmoo/crudwire "packagist - JanMoo/Crudwire")

# requirements
this package requires you to install:
* turbolinks.js 
* laravel authentication 

this package uses bootstrap

[guide turbolinks.js](https://medium.com/web-developer/turbolinks-with-laravel-speed-up-navigation-in-your-laravel-app-with-turobolinks-41efbade643b "medium turbolinks.js install guide")

[npm turbolink](https://www.npmjs.com/package/turbolinks "npm turbolinks.js")

[documentation laravel authentication](https://laravel.com/docs/7.x/authentication "laravel authentication")

# quickstart

note this a quickstart guide for more info visit links above

## install turbolinks

install turbolinks on your laravel app
```
npm install turbolinks
```

add Turbolinks to your app.js below bootstrap.js
```javascript
require('./bootstrap');
var Turbolinks = require("turbolinks")
Turbolinks.start()
```

add data-turbolinks-track attribute to your script/css tags
make sure that this happens on every page (layouts.app)
```html
<head>
  <script defer src="{{ mix('js/app.js') }}" data-turbolinks-track="true" ></script>
  
  <link href="{{mix('css/app.css')}}" rel="stylesheet" data-turbolinks-track="true">
</head>
```
make sure that your app.js is loaded on every page

## install laravel authentication 
```
composer require laravel/ui
```

run in laravel application

```
php artisan ui vue --auth
```

migrate database 


# install crudwire
```
composer require janmoo/crudwire
```
now you can run php artisan serve, and visit localhost/crudwire

# Diggin Deeper

## configuration options

To change the configuration options you must publish the config, this can be done with the command below.
```
php artisan vendor:publish
```
### routes
Standard crudwire is configured to be served on the route yourwebsite.example/crudwire. This prefix can be changed by publishing the config.

Now you can add an ENV variables to .env. CRUDWIRE_PREFIX which can be set to whatever you like. e.g: CRUDWIRE_PREFIX=example => yourwebsite.example/crudwire is where you will find the user overview.

The routes used by Crudwire are the following:
| route         | name          | method|
| ------------- |:-------------:| -----:|
| /prefix       | right-aligned | $1600 |
| /prefix/user  | centered      |   $12 |
| /prefix/user  | are neat      |    $1 |
| /prefix/user/{id}       | right-aligned | $1600 |
| /prefix/user  | centered      |   $12 |
| /prefix/user  | are neat      |    $1 |

* /prefix             name('crudwire')      GET 
* /prefix/user        name('newuser')       GET
* /prefix/user        name('createuser')    POST
* /prefix/user/{id}   name('edituser')      GET
* /prefix/user/{id}   name('updateuser')    POST

All of these routes use the CruwireUserController.php


There's 2 more variables which can be added to .ENV, CRUDWIRE_AUTH which can be set to TRUE(default FALSE). If true auth will be added to the middleware of the routes used by Crudwire.

### the layouts used by crudwire 

The last env variable that can be set in the .ENV, is CRUDWIRE_LAYOUT this defines the layout which crudwire uses to extend and display views. By default this is set to crudwire::layouts.base. Important don't forget to add the livewire directives (@livewireStyles and @livewireScripts), Add turbolinks.js and make sure your layout has a @section('content')



