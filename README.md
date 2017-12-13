# XMP Metadata extractor

[![Latest Stable Version](http://img.shields.io/packagist/v/jeroendesloovere/xmp-metadata-extractor.svg)](https://packagist.org/packages/jeroendesloovere/xmp-metadata-extractor)
[![License](http://img.shields.io/badge/license-MIT-lightgrey.svg)](https://github.com/jeroendesloovere/xmp-metadata-extractor/blob/master/LICENSE)
[![Build Status](https://travis-ci.org/jeroendesloovere/xmp-metadata-extractor.svg?branch=master)](https://travis-ci.org/jeroendesloovere/xmp-metadata-extractor)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jeroendesloovere/xmp-metadata-extractor/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jeroendesloovere/xmp-metadata-extractor/?branch=master)

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