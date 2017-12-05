# XMP Data extractor

> Extracting XMP data from images using PHP.

## Usage

### Installation

When using [composer](https://getcomposer.org), you can execute in your terminal:

```
composer require jeroendesloovere/xmp-data-extractor
```

### Examples

```php
use JeroenDesloovere\XmpDataExtractor;

$xmpDataExtractor = new XmpDataExtractor();
```

##### Get XmpData by fileName
```php
$xmpData = $xmpDataExtractor->extract('path/to/filename.jpg'):
```

##### Get XmpData by file content
```php
$xmpData = $xmpDataExtractor->convertToArray('... file contents ...'):
```

## Tests

> The XmpDataExtractor class has test cases.

Use `composer test tests` to execute the tests.