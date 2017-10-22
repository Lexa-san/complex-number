# Complex numbers calculation

The lib to do four operation with pair of complex numbers:
* addition,
* subtraction,
* multiplication,
* division.

## Requirements

* PHP >= 5.5 
* PHPUnit >= 6.4 

## Instalation

### Composer way

Add code bellow to your composer.json in project:
```json
{
    "require": {
        "Lexa-san/complex-number": "dev-master"
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Lexa-san/complex-number"
        }
    ]
}
```

Then just run in console:
```sh
composer update --no-dev
```

To autoload the lib classes in your code you can use composer autoloading:

```php
require_once '<project_root>/vendor/autoload.php';
```

## How to use

```php
use Lexasan\ComplexNumber;

// init by constructor
$z1 = new ComplexNumber\CNumber(5, 2);
// init by setters
$z2 = (new ComplexNumber\CNumber())->setReal(2)->setImag(-5);

$z3 = ComplexNumber\Calc::add($z1, $z2);
echo sprintf('%s + %s = %s', $z1, $z2, $z3);
```
