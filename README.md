ZF\Angular
==========

This a prototype of the `ZF\Angular` module for ZF2. 

Right now the module is inside a ZF2 skeleton application, just to test the
working code.

Generate the app.js file
------------------------

In order to generate the `app.js` file for [Angular](http://angularjs.org) you
need to execute the following command:

```bash
php public/index.php create app
```

This will generate the `app.js` file in the `/public/js/angular/` folder based
on the `angular.global.php` file (stored in `config/autoload/`).

If `app.js` already exists, then `ZF\Angular` will copy it to a new file with
the extension `.old`.
