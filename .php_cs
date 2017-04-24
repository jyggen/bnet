<?php

declare(strict_types=1);

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$header = <<<'EOT'
This file is part of the Battle.net API Client package.

(c) Jonas Stendahl <jonas@stendahl.me>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOT;

$config = Config::create();
$finder = Finder::create()->name('.php_cs')->ignoreDotFiles(false)->exclude([
    'build',
])->in(__DIR__);

$config->setFinder($finder);
$config->setIndent(str_repeat(' ', 4));
$config->setLineEnding("\n");
$config->setRiskyAllowed(true);
$config->setUsingCache(true);
$config->setRules([
    '@PHP56Migration' => true,
    '@PHP70Migration' => true,
    '@PHP71Migration' => false, // PHP 7.1+
    '@Symfony:risky' => true,
    'array_syntax' => [
        'syntax' => 'short',
    ],
    'combine_consecutive_unsets' => true,
    'declare_strict_types' => true,
    'doctrine_annotation_braces' => true,
    'doctrine_annotation_indentation' => true,
    'doctrine_annotation_spaces' => true,
    'header_comment' => [
        'header' => $header,
    ],
    'heredoc_to_nowdoc' => true,
    'linebreak_after_opening_tag' => true,
    'list_syntax' => [
        'syntax' => 'long', // "short" in PHP 7.1+
    ],
    'mb_str_functions' => true,
    'native_function_invocation' => false,
    'no_multiline_whitespace_before_semicolons' => true,
    'no_php4_constructor' => true,
    'no_short_echo_tag' => true,
    'no_unreachable_default_argument_value' => true,
    'no_useless_else' => true,
    'no_useless_return' => true,
    'ordered_class_elements' => true,
    'ordered_imports' => true,
    'php_unit_strict' => true,
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_order' => true,
    'semicolon_after_instruction' => true,
    'strict_comparison' => true,
    'strict_param' => true,
]);

return $config;
