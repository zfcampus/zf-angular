ZFAngular
=========

This a prototype of the ZFAngular module for ZF2. 
Right now the module is inside a ZF2 skeleton application, just to test the working code.

Generate the app.js file
------------------------

In order to generate the `app.js` file for Angular you need to execute the following command:

```bash
$ php public/index.php create app
```

this will generate the `app.js` file in `/public/js/angular` folder based on the `angular.global.php` file (stored in `/config/autoload`).
If the `app.js` already exists the ZFAngular will copy it in a new file with extension `.old`.

