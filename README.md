District5 - Random
==================

Generate... well... random stuff.

## Composer:

```
{
    "repositories":[
        {
            "type": "vcs",
            "url": "git@github.com:district5/php-random.git"
        }
    ],
    "require": {
        "district5/random": ">=1.0.0"
    }
}
```

* Installing for development environments:
  * `$ composer install`
* Installing for production environments. Ignoring the dev dependencies and optimise the autoloader:
  * `$ composer install --no-dev -o`
  
## Unit testing:

* Install with composer, ensuring you include the dev details:
  * `$ composer install`
* Run the phpunit binary:
  * `$ ./vendor/bin/phpunit`

## Common uses:

#### Generate a random guid:

```php
<?php
$cost = 64;
$includeHyphens = true;

$guid = \District5\Random\RandomGuid::get($cost, $includeHyphens); // Returns `string(36) "2ED29D69-D339-1636-52D9-F68D18B5E9F8"`
```

#### Generate a random string:

```php
<?php
$length = 16;

$string = \District5\Random\RandomString::get($length); // Returns `string(16) "5FXSgIzbvahPB9ef"`

// Or you can ignore some characters...
$ignoreCharacters = ['1', 'i', 'I', '0', 'O', 'o'];
$string = \District5\Random\RandomString::get($length, $ignoreCharacters); // Returns `string(16) "5FXSgkzbvahPB9ef"`
```

#### Generate a random password:

```php
<?php
$length = 8;
$includeUppercase = true;
$includeLowercase = true;
$includeNumber = true;
$includeSpecial = true;
$password = \District5\Random\RandomPassword::get(
    $length,
    $includeUppercase,
    $includeLowercase,
    $includeNumber,
    $includeSpecial
); // Returns `string(8) "<7[T%X*c"`
```

#### Generate a random integer:

```php
<?php
// Between 0 and 10
$int = \District5\Random\RandomInteger::get(0, 10);

// Any number between 0 and X - X is the value returned from mt_getrandmax()
$int = \District5\Random\RandomInteger::get();
```

#### Get a random key from an array:

```php
<?php
$data = [
    'foo',
    'bar'
];
$key = \District5\Random\RandomArrayKey::get($data);

// Or use associated arrays
$data = [
    'name' => 'Joe',
    'age' => 12
];
$key = \District5\Random\RandomArrayKey::get($data);

// Or mix it up!
$data = [
    'name' => 'Joe',
    'age' => 12,
    'golf'
];
$key = \District5\Random\RandomArrayKey::get($data);
```

#### Get a random value from an array:

```php
<?php
$data = [
    'foo',
    'bar'
];
$key = \District5\Random\RandomArrayItem::get($data);

// Or use associated arrays
$data = [
    'name' => 'Joe',
    'age' => 12
];
$key = \District5\Random\RandomArrayItem::get($data);

// Or mix it up!
$data = [
    'name' => 'Joe',
    'age' => 12,
    'golf'
];
$key = \District5\Random\RandomArrayItem::get($data);
```

#### Get a random DateTime

```php
<?php
// Get a random DateTime between the epoch and now
$randomDateTime = \District5\Random\RandomDateTime::get();

// Or pass DateTime instances to use custom minimum and maximum dates.
$oneDate = DateTime::createFromFormat('Y-m-d H:i:s', '2001-02-03 23:24:25');
$anotherDate = DateTime::createFromFormat('Y-m-d H:i:s', '2020-08-09 11:10:09');

$randomDateTime = \District5\Random\RandomDateTime::get($oneDate, $anotherDate);
```

#### Get a random date (string)

```php
<?php
// Get a random date between the epoch and now
$randomDateTime = \District5\Random\RandomDate::get();

// Or change the format to mm/dd/yyyy and use DateTime instances to use custom minimum and maximum dates.
$oneDate = DateTime::createFromFormat('Y-m-d H:i:s', '2001-02-03 23:24:25');
$anotherDate = DateTime::createFromFormat('Y-m-d H:i:s', '2020-08-09 11:10:09');

$randomDate = \District5\Random\RandomDate::get('m/d/Y', $oneDate, $anotherDate);
```
