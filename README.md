# XMP Metadata extractor

[![Packagist](https://img.shields.io/packagist/v/jeroendesloovere/xmp-metadata-extractor.svg)](jeroendesloovere/xmp-metadata-extractor)
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
$xmpData = $xmpDataExtractor->extractFromFile('path/to/filename.jpg'):

# OR get XmpData by given the file content - file_get_contents(...);
$xmpData = $xmpDataExtractor->extractFromContent('... file content ...'):
```
> `$xmpData` will be an `array` with all XMP Metadata.

## Tests

> The XmpMetadataExtractor class has test cases. [View all test cases](tests/XmpMetadataExtractor/XmpMetadataExtractorTest.php).

Use `vendor/bin/phpunit` to execute the tests.

## Code standards

We use [squizlabs/php_codesniffer](https://packagist.org/packages/squizlabs/php_codesniffer) to maintain the code standards.
Type the following to execute them:
```bash
# To view the code errors
vendor/bin/phpcs --standard=psr2 --extensions=php --warning-severity=0 --report=full "src"

# OR to fix the code errors
vendor/bin/phpcbf --standard=psr2 --extensions=php --warning-severity=0 --report=full "src"
```
> [Read documentation about the code standards](https://github.com/squizlabs/PHP_CodeSniffer/wiki)


## Documentation

The class is well documented inline. If you use a decent IDE you'll see that each method is documented with PHPDoc.

## Contributing

Contributions are **welcome** and will be fully **credited**.

### Pull Requests

> To add or update code

- **Coding Syntax** - Please keep the code syntax consistent with the rest of the package.
- **Add unit tests!** - Your patch won't be accepted if it doesn't have tests.
- **Document any change in behavior** - Make sure the README and any other relevant documentation are kept up-to-date.
- **Consider our release cycle** - We try to follow [semver](http://semver.org/). Randomly breaking public APIs is not an option.
- **Create topic branches** - Don't ask us to pull from your master branch.
- **One pull request per feature** - If you want to do more than one thing, send multiple pull requests.
- **Send coherent history** - Make sure each individual commit in your pull request is meaningful. If you had to make multiple intermediate commits while developing, please squash them before submitting.

### Issues

> For bug reporting or code discussions.

More info on how to work with GitHub on help.github.com.

## Credits

- [Jeroen Desloovere](https://github.com/jeroendesloovere)
- [All Contributors](https://github.com/jeroendesloovere/xmp-metadata-extractor/contributors)

## License

The module is licensed under [MIT](./LICENSE.md). In short, this license allows you to do everything as long as the copyright statement stays present.
