## Laravel Module Creator

![License](https://poser.pugx.org/gooddaykya/pdobase/license)

Laravel Modules Builder, *LaMB*, avails you create multiple independant applications under single *Laravel* root. Thus you get all the benefits of separate directory for each application, and access to reusable cross-projects parts.

## Installation
Clone this project to get up-to-date files and open in GitBash.

*LaMB* requires anchor point in Laravel config file for code appending, therefore, if you haven't done this yet, patch *Laravel*: it will open a directory for newly created modules and add a comment into `config/app.php` file. 

To apply patch run (skip, if you've already patched framework):
```
./laravel_patch
```

Or manually:
```
patch -p1 laravel.patch laravel_root/config/app.php
mkdir laravel_root/modules
```

Finally, to create a new module, run:
```
./build modulename laravel_root
```
*LaMB* will look for *modulename* among existing modules and, if not found, create it.

To verify result, open your browser and run:
```
path_to_laravel_public_index/module_name/
```

## Details

### Structure
```
laravel_root
+-- app
|   +--Providers
|   |   +--ModulenameServiceProvider.php
|
|-- modules
|   +-- Http
|   |   +-- Controllers
|   |   |   +-- ModulenameController.php
|   |   +-- Middleware
|   +-- routes
|   |   +-- web.php
|   +-- ModulenameModel.php
|
+-- resources
|   +-- views
|   |   +-- modulename
|   |   |   +-- index.blade.php
```

In addition, *ModulenameServiceProvider* will be added into `config/app.php` under:
```
/**
* Custom Modules
*/
 		App\Providers\ModulenameServiceProvider::class,
```
And a new namespace *Modulename* will be into `composer.json` before *App* namespace.
```
...
    "autoload": {
        "classmap": [
            "database"
        ],
        "psr-4": {
            "Modulename\\": "modules/modulename/",
            "App\\": "app/"
        }
    }
...
```
In the end you get a fully working module under *Modulename* namespace with all the domain logic hidden in `modules/modulename` and representation in `resouces/views/modulename`, and defined routes group under `modulename/` url.

## EOF
