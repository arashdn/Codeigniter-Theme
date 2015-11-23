# Codeigniter Theme Support 
Adding theme supoort to Codeigniter v3.

A library to support multiple theme's in a codeigniter application.

##Main features: 

- Use multiple themes and change theme by setting a value in config file or ediiting database(Database support not implemented yet)
- Master Page supoort.
- Change Page title , anywhere by calling a function.
- loading css , javascript and other assets by calling a simple function in style.


##How to install:
Simple! just copy all files to your codeigniter installation. The most important files are:

1. /application/libraries/View.php
2. /application/config/style.php

Other files are just theme dir.


##How to use and examples:
1. Fist set values in Style.php in configs.
2. Add View to auto load libraries. (Or you can load this library before you call it (not a good way))
3. Load a view like this:
```php
$this->view->load('home',$data); //this will load home.php in your current view folder, $data is same data as data in codeigniter native view
```
you can set a title when loading view:
```php
$this->view->load('home',$data,"Page title"); //same as above function plus, set page title to "Page title"
```

###Some Tips to design views
Always set page title to ``` ```
