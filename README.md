# crudwire
[![Latest Stable Version](https://poser.pugx.org/janmoo/crudwire/v)](//packagist.org/packages/janmoo/crudwire)
[![Total Downloads](https://poser.pugx.org/janmoo/crudwire/downloads)](//packagist.org/packages/janmoo/crudwire)
[![License](https://poser.pugx.org/janmoo/crudwire/license)](//packagist.org/packages/janmoo/crudwire)

This package provides a CRUD(create read update delete) interface, extending the laravel/ui auth package.
Cooked with Livewire and a Dash of turbolinks. 

packagist link: https://packagist.org/packages/janmoo/crudwire

# requirements
this package requires you to install turbolinks.js 
and laravel authentication 

full guide turbolinks.js:
https://medium.com/web-developer/turbolinks-with-laravel-speed-up-navigation-in-your-laravel-app-with-turobolinks-41efbade643b

documantation laravel authentication:
https://laravel.com/docs/7.x/authentication

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
## Diggin Deeper

# configuration options

Standard crudwire is configured to be served on the route yourwebsite.example/crudwire. This prefix can be changed by publishing the config.
```
php artisan vendor:publish
```
Now you can add an ENV variables to .env. CRUDWIRE_PREFIX which can be set to whatever you like. e.g: CRUDWIRE_PREFIX=example => yourwebsite.example/crudwire is where you will find the user overview.

There's 2 more variables which can be added to .ENV, CRUDWIRE_AUTH which can be set to TRUE(default FALSE). If true auth will be added to the middleware of the routes used by Crudwire.

The last env variable that can be set in the .ENV, is CRUDWIRE_LAYOUT this defines the layout which crudwire uses to extend and display views. By default this is set to crudwire::layouts.base. Important don't forget to add the livewire directives (@livewireStyles and @livewireScripts), Add turbolinks.js and make sure your layout has a @section('content')

