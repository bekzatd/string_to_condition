String to Condition Converter
=============================
Easy way to make a string condition

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist bekzatd/stringToCondition "*"
```

or add

```
"bekzatd/stringToCondition": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \bekzatd\stringToCondition\Converter::if(); ?>```