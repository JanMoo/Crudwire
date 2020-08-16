# crudwire
This package provides a user crud for standard laravel authentication
Cooked up with laravel/livewire and a dash of turbolinks.js

packagist link:https://packagist.org/packages/janmoo/crudwire

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

##install laravel authentication 
```
composer require laravel/ui
```

run in laravel application

```
php artisan ui vue --auth
```

migrate database 

//nota authenticate verify true???

#install crudwire
```
composer require janmoo/crudwire
```


