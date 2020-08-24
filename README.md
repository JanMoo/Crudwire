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

# requirements
this package requires you to install:
* turbolinks.js 
* laravel authentication 

this package uses [bootstrap](https://getbootstrap.com/ "bootsrap official site")

[guide turbolinks.js](https://medium.com/web-developer/turbolinks-with-laravel-speed-up-navigation-in-your-laravel-app-with-turobolinks-41efbade643b "medium turbolinks.js install guide")

[npm turbolink](https://www.npmjs.com/package/turbolinks "npm turbolinks.js")

[documentation laravel authentication](https://laravel.com/docs/7.x/authentication "laravel authentication")

[official livewire site](https://laravel-livewire.com/)

# quickstart

note this a quickstart guide for more info visit links above

## install laravel authentication 
```
composer require laravel/ui
```

run in laravel application

```
php artisan ui vue --auth
```

migrate database 

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

# install crudwire
```
composer require janmoo/crudwire
```

npm install & npm run dev 

```
npm i
npm run dev
```
now you can run php artisan serve, and visit localhost/crudwire

# Diggin Deeper
checkout documentation on official site
[official website](https://crudwire.be "Crudwire official website")
