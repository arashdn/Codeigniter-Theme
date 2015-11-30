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
inside a view $template is an object to access some functions and values about template, Here are a few examples of how to use it:

####Page Title

Always set page title to ``` $template->getTitle() ``` like this:
```php
<title><?php echo $template->getTitle() ?></title>
```
you can also call setTitle function to set Page title inside a view(call it before setting the view)
```php
<?php $template->setTitle("title override"); ?>
```
if you don't set title in controller (in load function) or inside a view (like above), page title will be defualt title value. (in config file)

####Master Page
you can call setMasterPage function to set a master page anywhere in your view.
```php
<?php $template->setMasterPage('master.php');//this will set master page to master.php ?>
```
in master page you MUST add this line any where you like to display page content:
```php
<?php echo $content; ?>
```

####Sub Views
For creating a sub view you can add the file in style folder(or any sub folder in it) then, any where you like to load sub view call it like this:
```php
<?php $template->subView('sub1') ?>
```
This code will load sub1.php in style directory

####Loading Assets
You can load assets by calling their functions.  


**1. Stylesheet**  
you can add css files any where you need by calling css function.  
This function has two argumnets:  
First argument is file name (In your css folder).  
Second argument is optional, It can be true or false and defualt value is false.  
if you set this argument to true , it will return only css file address , for example:
```
http://localhost.com/application/views/mainstyle/css/style.css
```
and if you set it to false or don't set it up it will load address inside a link tag, for example:
```
<link rel="stylesheet" href="http://localhost.com/application/views/mainstyle/css/style.css"/>
```
call function like this: 
```php
<?php echo $template->css('style.php');?>
```
Or
```php
<link rel="stylesheet" href="<?php echo $template->css('style.php',true)?>"/>
```


**2. Javascript**  
you can add js files any where you need by calling js function.  
This function has two argumnets:  
First argument is file name (In your js folder).  
Second argument is optional, It can be true or false and defualt value is false.  
if you set this argument to true , it will return only js file address , for example:
```
http://localhost.com/application/views/mainstyle/js/myscript.js
```
and if you set it to false or don't set it up it will load address inside a script tag, for example:
```
<script src="http://localhost.com/application/views/mainstyle/js/myscript.js"></script>
```
call function like this: 
```php
<?php echo $template->js('myscript.js');?>
```
Or
```php
<script src="<?php echo $template->js('myscript.js',true)?>"></script>
```

**3. Image**  
you can add images any where you need by calling img function.  
This function has four argumnets:  
First argument is file name (In your image folder).  
Second argument is optional, It can be true or false and defualt value is false.  
if you set this argument to true , it will return only image file address , for example:
```
http://localhost.com/application/views/mainstyle/img/a.png
```
and if you set it to false or don't set it up it will load address inside a script tag, for example:
```
<img src="http://localhost.com/application/views/mainstyle/img/a.png" />
```
Third and forth arguments are also optional, they are image width and height. If not set image original size will be loaded:

call function like this: 
```php
<?php echo $template->img('a.png',false,100,50); ?>
```
Or
```php
<img src="<?php echo $template->img('a.png',true) ?>" width="100" height="50"/>
```


**4. Other assets**  
you can add any other assets by calling asset function (it will only return asset path with out any tags)
