Конвертер Строк в Условия
=============================
Легко конвертируйте строки в логические выражения 

Установка
------------

Желательно установить библиотеку через [composer](http://getcomposer.org/download/).

Для этого скопируйте код в терминал

```
php composer.phar require --prefer-dist "bekzatd/string_to_condition:*"
```

или добавьте

```
"bekzatd/string_to_condition:*"
```

в разделе `require` в ваш файл `composer.json`.


Как использовать?
-----

Самый простой способ использования  :

```php
<?= \bekzatd\string_to_condition\Converter::if(" логическое выражение "); ?>
```

Примеры:
-----

Просто пишите свое выражение внутри метода `if`  :

```php
use \bekzatd\string_to_condition\Converter;

Converter::if("2>1 || 2<1"); // true
Converter::if("true || false"); //true
Converter::if("2<1 || false && 0"); // false
```

и результатом будет ответ типа `boolean`

```
true или false
```

Правила:
-----

`2>1` - ваши сравнения надо писать слитно

`2>1 || 2<1` - а вот логические операторы наоборот с пробелом

`|| , &&` - принимаются только два вида операторов `&&` , `||` 
