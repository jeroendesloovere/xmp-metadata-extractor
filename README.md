# XMP Metadata extractor

> Extracting XMP metadata from images/files using PHP.

## Usage

### Installation

When using [composer](https://getcomposer.org), you can execute in your terminal:

```
composer require jeroendesloovere/xmp-metadata-extractor
```

### Example

```php
use JeroenDesloovere\XmpMetadataExtractor;
$xmpDataExtractor = new XmpMetadataExtractor();

# Get XmpData from file
$xmpData = $xmpDataExtractor->extract('path/to/filename.jpg'):

# OR get XmpData by given the file content - file_get_contents(...);
$xmpData = $xmpDataExtractor->convertToArray('... file content ...'):
```

## Tests

> The XmpMetadataExtractor class has test cases. [View all test cases](tests/XmpMetadataExtractor/XmpMetadataExtractorTest.php).

Use `composer test tests` to execute the tests.