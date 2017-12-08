# XMP Data extractor

> Extracting XMP data from images/files using PHP.

## Usage

### Installation

When using [composer](https://getcomposer.org), you can execute in your terminal:

```
composer require jeroendesloovere/xmp-data-extractor
```

### Example

```php
use JeroenDesloovere\XmpDataExtractor;
$xmpDataExtractor = new XmpDataExtractor();

# Get XmpData from file
$xmpData = $xmpDataExtractor->extract('path/to/filename.jpg'):

# OR get XmpData by given the file content - file_get_contents(...);
$xmpData = $xmpDataExtractor->convertToArray('... file content ...'):
```

## Tests

> The XmpDataExtractor class has test cases. [View all test cases](tests/XmpDataExtractor/XmpDataExtractorTest.php).

Use `composer test tests` to execute the tests.