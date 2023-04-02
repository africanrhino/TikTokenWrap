# TikTokenWrap
 tiktokenwrap is a wrapper in php for tiktoken the fast BPE tokeniser for use with OpenAI's models. 

TikTokenWrap
============

TikTokenWrap is a PHP wrapper for the TikToken Python library, which allows encoding and decoding strings using the specified encodings from the TikToken library. It provides a convenient way to use the TikToken library in PHP code by executing Python code as shell commands and handling the input/output between PHP and Python.

Prerequisites
-------------

*   PHP 7.0 or higher
*   Python 3.6 or higher
*   TikToken Python library

Installation
------------

1.  Download or clone this repository.
2.  Copy the `TikTokenWrap.php` file to your project directory.
3.  Include the `TikTokenWrap.php` file in your PHP script using `require_once` or `include`.

Usage
-----

php

```php
// Include the class file
require_once 'TikTokenWrap.php';

// Encode a string using the TikToken library
$input_string = "This is a sample string.";
$encoding = "some_encoding";
$result = TikTokenWrap::encode($input_string, $encoding);
print_r($result);

// Decode the encoded string
$decoded_string = TikTokenWrap::decode($result['encoded'], $encoding);
echo "Decoded string: " . $decoded_string . PHP_EOL;

// Count the tokens in the encoded string
$token_count = TikTokenWrap::countTokens($result['encoded']);
echo "Token count: " . $token_count . PHP_EOL;
```

Methods
-------

*   `encode($input_string, $encoding)`: Encodes an input string using the specified encoding from the TikToken library. Returns an array containing the encoded tokens and the cost (number of tokens).
*   `decode($encoded_string, $encoding)`: Decodes an encoded string using the specified encoding from the TikToken library. Returns the decoded string.
*   `countTokens($tokens)`: Counts the number of tokens in the given array `$tokens`. Returns the token count.

License
-------

This project is licensed under the MIT License.

Disclaimer
----------

Please note that you need to have Python and the TikToken library installed on your system for this class to work. The TikToken library may have its own set of dependencies and requirements.
